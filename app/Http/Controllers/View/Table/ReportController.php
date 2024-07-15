<?php

namespace App\Http\Controllers\View\Table;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $cari = false;
        if ($request->has('halaman')) {
            $pageNumber = $request->input('halaman');
            $report = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/report?page={$pageNumber}");
        } else {
            $report = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/report");
        }
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        return view('table.report.report', compact('report', 'vehicle', 'cari'));
    }
    public function search(Request $request){
        $data = $request->all();
        $cari_laporan = $request->input('cari_laporan');
        $kategori = $request->input('kategori');
        $token = $request->query('_token');
        $vehicleID = $request->input('vehicleID');
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $cari = true;
        if ( $request->has('halaman')) {
            $pageNumber = $request->input('halaman');
            $report = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/report/search?cari_laporan={$request->input('cari_laporan')}&kategori={$request->input('kategori')}&page={$pageNumber}&vehicleID={$request->input('vehicleID')}");
        } else {
            $report = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/report/search?cari_laporan={$request->input('cari_laporan')}&kategori={$request->input('kategori')}&vehicleID={$request->input('vehicleID')}", $data);
        }
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        return view('table.report.report', compact('vehicle', 'vehicleID', 'report', 'cari', 'cari_laporan', 'kategori', 'token'));
    }
    public function create()
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        return view('table.report.addReport', compact('vehicle'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|string|not_in:invalid',
            'km_before' => 'required|numeric',
            'km_after' => 'nullable|numeric|gte:km_before',
            'departure_date' => 'required|date',
            'departure_time' => 'required',
            'arrival_date' => 'nullable|date|after_or_equal:departure_date',
            'arrival_time' => 'nullable|arrival_time_after_departure',
            'fuel' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'fuel_cost' => 'nullable|numeric',
            'remark' => 'required|string',
            'users_id' => 'exists:users,id',
        ], [
            'km_after.gte' => 'Nilai :attribute harus lebih besar dari KM Before',
            'required' => 'Kolom :attribute harus diisi',
            'vehicle_id.not_in' => 'Kolom :attribute harus diisi dengan plat nomor yang tersedia',
            'numeric' => 'Kolom :attribute hanya menerima angka',
            'fuel.regex' => 'Kolom :attribute hanya menerima 2 angka dibelakang koma',
            'date' => 'Kolom :attribute hanya menerima bulan-tanggal-tahun',
            'arrival_date.after_or_equal' => 'Tanggal :attribute tidak boleh lebih lawas dari departure date',
            'users_id.exists' => 'User dengan ID yang diberikan tidak ditemukan',
            'arrival_time.arrival_time_after_departure' => 'Arrival Time tidak boleh kurang dari Departure Time ketika Arrival Date dan Departure Date memiliki tanggal yang sama',
        ]);
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $report = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post(config('app.url') . "/api/report/store", $data);
        if ($report['status'] == 201){
            toastr()->success("Laporan berhasil ditambah", "Berhasil");
        } else if ($report['status'] == 400){
            toastr()->error("Laporan gagal ditambah", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/laporan');
    }
    public function edit($report_id)
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $report = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/report/show={$report_id}");
        return view('table.report.editReport',compact('report', 'vehicle'));
    }
    public function update($report_id, Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|string|not_in:invalid',
            'km_before' => 'required|numeric',
            'km_after' => 'nullable|numeric|gte:km_before',
            'departure_date' => 'required|date',
            'departure_time' => 'required',
            'arrival_date' => 'nullable|date|after_or_equal:departure_date',
            'arrival_time' => 'nullable|arrival_time_after_departure',
            'fuel' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'fuel_cost' => 'nullable|numeric',
            'remark' => 'required|string',
            'users_id' => 'exists:users,id',
        ], [
            'km_after.gte' => 'Nilai :attribute harus lebih besar dari KM Before',
            'required' => 'Kolom :attribute harus diisi',
            'vehicle_id.not_in' => 'Kolom :attribute harus diisi dengan plat nomor yang tersedia',
            'numeric' => 'Kolom :attribute hanya menerima angka',
            'fuel.regex' => 'Kolom :attribute hanya menerima 2 angka dibelakang koma',
            'date' => 'Kolom :attribute hanya menerima bulan-tanggal-tahun',
            'arrival_date.after_or_equal' => 'Tanggal :attribute tidak boleh lebih lawas dari departure date',
            'users_id.exists' => 'User dengan ID yang diberikan tidak ditemukan',
            'arrival_time.arrival_time_after_departure' => 'Arrival Time tidak boleh kurang dari Departure Time ketika Arrival Date dan Departure Date memiliki tanggal yang sama',
        ]);
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $report = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->put(config('app.url') . "/api/report/{$report_id}", $data);
        if ($report['status'] == 200){
            toastr()->success('Laporan berhasil diperbarui', 'Berhasil');
        } else if ($report['status'] == 400){
            toastr()->error('Laporan gagal diperbarui', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/laporan');
    }
    public function destroy($report_id){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $report = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->delete(config('app.url') . "/api/report/delete={$report_id}");
        if ($report['status'] == 200){
            toastr()->success("Laporan Jalan dengan ID [{$report['reportID']}] berhasil dihapus", "Berhasil");
        } else if ($report['status'] == 400){
            toastr()->error("Laporan Jalan gagal ditambah", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/laporan');
    }
}
