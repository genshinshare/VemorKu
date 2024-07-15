<?php

namespace App\Http\Controllers\View\Table;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ReportFinanceController extends Controller
{
    public function index(Request $request){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $cari = false;
        if ($request->has('halaman')) {
            $pageNumber = $request->input('halaman');
            $report_finance = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/reportFinance?page={$pageNumber}");
        } else {
            $report_finance = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/reportFinance");
        }
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        return view('table.reportfinance.reportfinance', compact('report_finance', 'vehicle', 'cari'));
    }
    public function search(Request $request){
        $data = $request->all();
        $cari_laporanKlaim = $request->input('cari_laporanKlaim');
        $kategori = $request->input('kategori');
        $token = $request->query('_token');
        $vehicleID = $request->input('vehicleID');
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $cari = true;
        if ( $request->has('halaman')) {
            $pageNumber = $request->input('halaman');
            $report_finance = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/reportFinance/search?cari_laporanKlaim={$request->input('cari_laporanKlaim')}&kategori={$request->input('kategori')}&page={$pageNumber}&vehicleID={$vehicleID}");
        } else {
            $report_finance = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/reportFinance/search?cari_laporanKlaim={$request->input('cari_laporanKlaim')}&kategori={$request->input('kategori')}&vehicleID={$vehicleID}", $data);
        }
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        return view('table.reportfinance.reportfinance', compact('vehicle', 'vehicleID', 'report_finance', 'cari', 'cari_laporanKlaim', 'kategori', 'token'));
    }
    public function create()
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        return view('table.reportfinance.addReportFinance', compact('vehicle'));
    }
    public function store(Request $request)
    {
        if(is_null($request->report_id)) {
            $request->validate([
                'vehicle_id' => 'required|string|not_in:invalid',
                'report_id' => 'nullable|exists:report,report_id',
                'date_of_application' => 'required|date',
                'fuel' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
                'fuel_cost' => 'nullable|numeric',
                'stnk_cost' => 'nullable|numeric',
                'kir_cost' => 'nullable|numeric',
                'repair_cost' => 'nullable|numeric',
                'maintenance_cost' => 'nullable|numeric',
                'carwash_cost' => 'nullable|numeric',
                'toll_cost' => 'nullable|numeric',
                'parking_cost' => 'nullable|numeric',
                'other_cost' => 'nullable|numeric',
                'remark' => 'nullable|string',
                'users_id' => 'exists:users,id',
            ], [
                'required' => 'Kolom :attribute harus diisi',
                'vehicle_id.not_in' => 'Kolom :attribute harus diisi dengan plat nomor yang tersedia',
                'numeric' => 'Kolom :attribute hanya menerima angka',
                'fuel.regex' => 'Kolom :attribute hanya menerima 2 angka dibelakang koma',
                'date' => 'Kolom :attribute hanya menerima bulan-tanggal-tahun',
                'users_id.exists' => 'User dengan ID yang diberikan tidak ditemukan',
                'report_id.exists' => 'Report ID yang diberikan tidak ditemukan'
            ]);
        } else {
            $request->validate([
                'report_id' => 'nullable|exists:report,report_id',
                'date_of_application' => 'required|date',
                'fuel' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
                'fuel_cost' => 'nullable|numeric',
                'stnk_cost' => 'nullable|numeric',
                'kir_cost' => 'nullable|numeric',
                'repair_cost' => 'nullable|numeric',
                'maintenance_cost' => 'nullable|numeric',
                'carwash_cost' => 'nullable|numeric',
                'toll_cost' => 'nullable|numeric',
                'parking_cost' => 'nullable|numeric',
                'other_cost' => 'nullable|numeric',
                'remark' => 'nullable|string',
                'users_id' => 'exists:users,id',
            ], [
                'required' => 'Kolom :attribute harus diisi',
                'numeric' => 'Kolom :attribute hanya menerima angka',
                'fuel.regex' => 'Kolom :attribute hanya menerima 2 angka dibelakang koma',
                'date' => 'Kolom :attribute hanya menerima bulan-tanggal-tahun',
                'users_id.exists' => 'User dengan ID yang diberikan tidak ditemukan',
                'report_id.exists' => 'Report ID yang diberikan tidak ditemukan'
            ]);
        }
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $report_finance = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post(config('app.url') . "/api/reportFinance/store", $data);
        if ($report_finance['status'] == 201){
            toastr()->success("Laporan Klaim berhasil ditambah", "Berhasil");
        } else if ($report_finance['status'] == 400){
            toastr()->error("Laporan Klaim gagal ditambah", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/laporanKlaim');
    }
    public function edit($report_finance_id)
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $report_finance = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/reportFinance/show={$report_finance_id}");
        return view('table.reportfinance.editReportFinance',compact('report_finance', 'vehicle'));
    }
    public function update($report_finance_id, Request $request)
    {
        if(is_null($request->report_id)) {
            $request->validate([
                'vehicle_id' => 'required|string|not_in:invalid',
                'report_id' => 'nullable|exists:report,report_id',
                'date_of_application' => 'required|date',
                'fuel' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
                'fuel_cost' => 'nullable|numeric',
                'stnk_cost' => 'nullable|numeric',
                'kir_cost' => 'nullable|numeric',
                'repair_cost' => 'nullable|numeric',
                'maintenance_cost' => 'nullable|numeric',
                'carwash_cost' => 'nullable|numeric',
                'toll_cost' => 'nullable|numeric',
                'parking_cost' => 'nullable|numeric',
                'other_cost' => 'nullable|numeric',
                'remark' => 'nullable|string',
                'users_id' => 'exists:users,id',
            ], [
                'required' => 'Kolom :attribute harus diisi',
                'vehicle_id.not_in' => 'Kolom :attribute harus diisi dengan plat nomor yang tersedia',
                'numeric' => 'Kolom :attribute hanya menerima angka',
                'fuel.regex' => 'Kolom :attribute hanya menerima 2 angka dibelakang koma',
                'date' => 'Kolom :attribute hanya menerima bulan-tanggal-tahun',
                'users_id.exists' => 'User dengan ID yang diberikan tidak ditemukan',
                'report_id.exists' => 'Report ID yang diberikan tidak ditemukan'
            ]);
        } else {
            $request->validate([
                'report_id' => 'nullable|exists:report,report_id',
                'date_of_application' => 'required|date',
                'fuel' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
                'fuel_cost' => 'nullable|numeric',
                'stnk_cost' => 'nullable|numeric',
                'kir_cost' => 'nullable|numeric',
                'repair_cost' => 'nullable|numeric',
                'maintenance_cost' => 'nullable|numeric',
                'carwash_cost' => 'nullable|numeric',
                'toll_cost' => 'nullable|numeric',
                'parking_cost' => 'nullable|numeric',
                'other_cost' => 'nullable|numeric',
                'remark' => 'nullable|string',
                'users_id' => 'exists:users,id',
            ], [
                'required' => 'Kolom :attribute harus diisi',
                'numeric' => 'Kolom :attribute hanya menerima angka',
                'fuel.regex' => 'Kolom :attribute hanya menerima 2 angka dibelakang koma',
                'date' => 'Kolom :attribute hanya menerima bulan-tanggal-tahun',
                'users_id.exists' => 'User dengan ID yang diberikan tidak ditemukan',
                'report_id.exists' => 'Report ID yang diberikan tidak ditemukan'
            ]);
        }
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $report_finance = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->put(config('app.url') . "/api/reportFinance/{$report_finance_id}", $data);
        if ($report_finance['status'] == 200){
            toastr()->success('Laporan Klaim berhasil diperbarui', 'Berhasil');
        } else if ($report_finance['status'] == 400){
            toastr()->error('Laporan Klaim gagal diperbarui', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/laporanKlaim');
    }
    public function destroy($report_finance_id){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $report_finance = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->delete(config('app.url') . "/api/reportFinance/delete={$report_finance_id}");
        if ($report_finance['status'] == 200){
            toastr()->success("Laporan Klaim dengan ID [{$report_finance['reportFinanceID']}] berhasil dihapus", 'Berhasil');
        } else if ($report_finance['status'] == 400){
            toastr()->error('Laporan Klaim gagal dihapus', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/laporanKlaim');
    }
}
