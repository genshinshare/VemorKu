<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function help() {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all");
        $department = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/department");
        $driver = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/driver");
        return view('help', compact('vehicle', 'department', 'driver'));
    }
    public function dashboard() {
        $kategori = 'date_recorded';
        $cari_laporanKlaim = '';
        $cari_laporan = '';
        $vehicleID = 'all';
        $now = auth()->user();
        $bearerToken = $now->api_token;

        // terakhir diperbarui
        $orderBy = 'created_at';
        $report = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/report/search?cari_laporan={$cari_laporan}&kategori={$kategori}&vehicleID={$vehicleID}&dashboard=true&orderBy={$orderBy}");
        $dateReport = $report['report']['data'][0]['created_at'];
        $dateR = \Carbon\Carbon::parse($dateReport)->setTimezone('Asia/Jakarta')->format('d/m/Y - H:i');

        $report_finance = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/reportFinance/search?cari_laporanKlaim={$cari_laporanKlaim}&kategori={$kategori}&vehicleID={$vehicleID}&dashboard=true&orderBy={$orderBy}");
        $dateReportFinance = $report_finance['report_finance']['data'][0]['created_at'];
        $dateRF = \Carbon\Carbon::parse($dateReportFinance)->setTimezone('Asia/Jakarta')->format('d/m/Y - H:i');
       
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all?dashboard=true&orderBy={$orderBy}");
        $dateVehicle = $vehicle['vehicle'][0]['created_at'];
        $dateV = \Carbon\Carbon::parse($dateReport)->setTimezone('Asia/Jakarta')->format('d/m/Y - H:i');
        if ( $vehicle['vehicle'][0]['status'] == 0) {
            $status = "Tidak Aktif";
        } else {
            $status = "Aktif";
        }

        //terakhir diupdate
        $orderBy = 'updated_at';
        $reportNew = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/report/search?cari_laporan={$cari_laporan}&kategori={$kategori}&vehicleID={$vehicleID}&dashboard=true&orderBy={$orderBy}");
        $dateReportNew = $reportNew['report']['data'][0]['updated_at'];
        $dateNewR = \Carbon\Carbon::parse($dateReportNew)->setTimezone('Asia/Jakarta')->format('d/m/Y - H:i');

        $report_finance_new = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/reportFinance/search?cari_laporanKlaim={$cari_laporanKlaim}&kategori={$kategori}&vehicleID={$vehicleID}&dashboard=true&orderBy={$orderBy}");
        $dateReportFinanceNew = $report_finance_new['report_finance']['data'][0]['updated_at'];
        $dateNewRF = \Carbon\Carbon::parse($dateReportFinanceNew)->setTimezone('Asia/Jakarta')->format('d/m/Y - H:i');
        
        $vehicleNew = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/all?dashboard=true&orderBy={$orderBy}");
        $dateVehicleNew = $vehicleNew['vehicle'][0]['updated_at'];
        $dateNewV = \Carbon\Carbon::parse($dateVehicleNew)->setTimezone('Asia/Jakarta')->format('d/m/Y - H:i');
        if ( $vehicleNew['vehicle'][0]['status'] == 0) {
            $statusNew = "Tidak Aktif";
        } else {
            $statusNew = "Aktif";
        }

        return view('dashboard', compact('dateR', 'dateNewR', 'dateRF', 'dateNewRF' , 'dateV', 'dateNewV', 'report', 'reportNew', 'report_finance', 'report_finance_new', 'vehicle', 'vehicleNew', 'status', 'statusNew'));
    }
}
