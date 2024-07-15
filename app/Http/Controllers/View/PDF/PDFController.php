<?php

namespace App\Http\Controllers\View\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Dompdf\Dompdf;

class PDFController extends Controller
{
    public function vemor()
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        return view('export.vemor', compact('vehicle'));
    }
    public function vemorpdf(Request $request)
    {
        $request->validate([
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:2020',
            'vehicle_id' => 'required|string|max:10',
        ], [
            'required' => 'Kolom :attribute harus diisi',
            'month.min' => 'Pilih bulan yang tersedia di kolom :attribute',
            'vehicle_id.max' => 'Pilih vehicle id yang tersedia di kolom :attribute',
            'month.integer' => 'Pilih bulan yang tersedia di kolom :attribute'
        ]);
        $bulan = $request->month;
        $previousMonth = null;
        $previousYear = null;
        if ($bulan == 1) {
            $bulan = 'January';
        } else if ($bulan == 2){
            $bulan = 'February';
        } else if ($bulan == 3){
            $bulan = 'March';
        } else if ($bulan == 4){
            $bulan = 'April';
        } else if ($bulan == 5){
            $bulan = 'May';
        } else if ($bulan == 6){
            $bulan = 'June';
        } else if ($bulan == 7){
            $bulan = 'July';
        } else if ($bulan == 8){
            $bulan = 'August';
        } else if ($bulan == 9){
            $bulan = 'September';
        } else if ($bulan == 10){
            $bulan = 'October';
        } else if ($bulan == 11){
            $bulan = 'November';
        } else if ($bulan == 12){
            $bulan = 'December';
        }
        $BULAN = strtoupper($bulan);
        $tahun = $request->year;
        $plat_mobil = $request->vehicle_id;
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/show={$plat_mobil}");
        $report = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/report/searchAll", $data);

        if (isset($report['lastReport']['departure_date'])) {
            $previousMonth = Carbon::parse(($report['lastReport']['departure_date']))->format('m');
            if ($previousMonth == 1) {
                $previousMonth = 'January';
            } else if ($previousMonth == 2){
                $previousMonth = 'February';
            } else if ($previousMonth == 3){
                $previousMonth = 'March';
            } else if ($previousMonth == 4){
                $previousMonth = 'April';
            } else if ($previousMonth == 5){
                $previousMonth = 'May';
            } else if ($previousMonth == 6){
                $previousMonth = 'June';
            } else if ($previousMonth == 7){
                $previousMonth = 'July';
            } else if ($previousMonth == 8){
                $previousMonth = 'August';
            } else if ($previousMonth == 9){
                $previousMonth = 'September';
            } else if ($previousMonth == 10){
                $previousMonth = 'October';
            } else if ($previousMonth == 11){
                $previousMonth = 'November';
            } else if ($previousMonth == 12){
                $previousMonth = 'December';
            }
            $previousYear = Carbon::parse(($report['lastReport']['departure_date']))->format('Y');
        }
        $report_finance = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/reportFinance/searchAll", $data);
        foreach ($vehicle['department'] as $d) {
            if ($vehicle['vehicle']['department_id'] == $d['id']) {
                $department_name = strtoupper($d['department_name']);
            }
        }
        foreach ($vehicle['driver'] as $d) {
            if ($vehicle['vehicle']['driver_id'] == $d['id']) {
                $driver_name = strtoupper($d['driver_name']);
            }
        }
        $dompdf = new Dompdf();
        $html = view('templatepdf.vemor', compact('department_name', 'driver_name', 'report', 'report_finance','vehicle','BULAN', 'tahun', 'plat_mobil', 'bulan', 'previousMonth', 'previousYear'));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('folio', 'portrait');
        $dompdf->render();
        $dompdf->stream("{$plat_mobil} - Vemor {$bulan} {$tahun}.pdf");
        return redirect('/vemor');
    }
    public function carcondition()
    {
        return view('export.carcondition');
    }
    public function carconditionpdf(Request $request)
    {
        $request->validate([
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:2020',
        ], [
            'required' => 'Kolom :attribute harus diisi',
            'month.min' => 'Pilih nama bulan yang tersedia di kolom Month',
            'month.integer' => 'Pilih nama bulan yang tersedia di kolom Month',
        ]);
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        foreach ($vehicle['vehicle'] as $v) {
            foreach ($vehicle['department'] as $d) {
                if ($v['department_id'] === $d['id']) {
                    if (!isset($total[$d['id']])) {
                        $total[$d['id']] = 1;
                    } else {
                        $total[$d['id']]++;
                    }
                }
                
            }
        }
        $data = $request->all();
        $carcondition = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/carcondition/data", $data);
        $dateRequested = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/carcondition/dateRequested", $data);
        $timeReport = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/carcondition/timeReport", $data);
        // return view('templatepdf.carcondition', compact('vehicle', 'carcondition', 'dateRequested', 'timeReport'));
        $dompdf = new Dompdf();
        $html = view('templatepdf.carcondition', compact('carcondition', 'dateRequested', 'vehicle', 'timeReport'));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('folio', 'landscape');
        $dompdf->render();
        $dompdf->stream("Car Condition {$dateRequested['dateRequested']['month']} {$dateRequested['dateRequested']['year']}.pdf");
        redirect('/carcondition');
    }
    public function expensetahunan()
    {
        return view('export.expensetahunan');
    }
    public function expensetahunanpdf(Request $request)
    {
        $request->validate([
            'year' => 'required|integer|min:2020',
        ], [
            'required' => 'Kolom :attribute harus diisi',
        ]);
        $data = $request->all();
        $year = $request->year;
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $expensetahunan = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/expensetahunan", $data);
        // return view('templatepdf.expensetahunan', compact('expensetahunan', 'year'));

        $dompdf = new Dompdf();
        $html = view('templatepdf.expensetahunan', compact('expensetahunan', 'year'));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('folio', 'landscape');
        $dompdf->render();
        $dompdf->stream("Expense Cabang {$expensetahunan['expense_tahunan']['vehicle'][0]['branch']} {$year}.pdf");
        return redirect('/expensetahunan');
    }
    public function rasiobbm()
    {
        return view('export.rasiobbm');
    }
    public function rasiobbmpdf(Request $request)
    {
        $request->validate([
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:2020',
        ], [
            'required' => 'Kolom :attribute harus diisi',
            'month.min' => 'Pilih nama bulan yang tersedia di kolom Month',
            'month.integer' => 'Pilih nama bulan yang tersedia di kolom Month',
        ]);

        $bulan = $request->month;
        if ($bulan == 1) {
            $bulan = 'JANUARI';
        } else if ($bulan == 2){
            $bulan = 'FEBRUARI';
        } else if ($bulan == 3){
            $bulan = 'MARET';
        } else if ($bulan == 4){
            $bulan = 'APRIL';
        } else if ($bulan == 5){
            $bulan = 'MEI';
        } else if ($bulan == 6){
            $bulan = 'JUNI';
        } else if ($bulan == 7){
            $bulan = 'JULI';
        } else if ($bulan == 8){
            $bulan = 'AGUSTUS';
        } else if ($bulan == 9){
            $bulan = 'SEPTEMBER';
        } else if ($bulan == 10){
            $bulan = 'OKTOBER';
        } else if ($bulan == 11){
            $bulan = 'NOVEMBER';
        } else if ($bulan == 12){
            $bulan = 'DESEMBER';
        }
        $tahun = $request->year;
        
        $updateDate = Carbon::now()->format('d/m/Y');

        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $rasiobbm = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/rasiobbm", $data);
        // return view('templatepdf.rasiobbm', compact('rasiobbm', 'bulan', 'tahun', 'updateDate'));

        if ($rasiobbm['status'] === 201) {
            $dompdf = new Dompdf();
            $html = view('templatepdf.rasiobbm', compact('rasiobbm', 'bulan', 'tahun', 'updateDate'));
            $dompdf->loadHtml($html);
            $dompdf->setPaper('legal', 'landscape');
            $dompdf->render();
            $dompdf->stream("Rasio BBM {$bulan} {$tahun}.pdf");
        } else {
            toastr()->error('Gagal membuat Rasio BBM. Lihat Petunjuk > Menu Export dibagian catatan Rasio BBM.', "Gagal");
            return redirect('/rasiobbm');
        }
    }
}
