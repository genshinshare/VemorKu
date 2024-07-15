<?php

namespace App\Http\Controllers\Api\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Report;
use App\Models\ReportFinance;
use App\Models\Vehicle;
use Carbon\Carbon;

class RasioBBMAPIController extends Controller
{
    public function rasiobbm(Request $request) {
        try {
            $vehicle = Vehicle::all();
            $data = [];
            $dataKlaim = [];
            $month = $request->input('month');
            $year = $request->input('year');

            $requestedDate = Carbon::create($year, $month, 1)->format('Y-m-d');

            $total_semua_harga = 0;
            $total_semua_bbm = 0;
            $total_semua_km = 0;

            $response = [];
            foreach ($vehicle as $v) {
                $rasio_bulanan = 0;
                $previousKm = 0;
                $total_harga = 0;
                $total_bbm = 0.00;
                $total_km = 0;
                $laporan_terbanyak = 0;

                //mencari tgl dan km terakhir sebelum bulan ini
                $lastReport = Report::where('vehicle_id', '=', $v->vehicle_id)
                                ->where('departure_date', '<' , $requestedDate)
                                ->where('fuel', '!=', null)
                                ->where('fuel', '!=', 0.00)
                                ->orderBy('km_after', 'desc')
                                ->first();

                if (!is_null($lastReport)) { //jika ada report sebelumnya
                    $tgl_terakhir = $lastReport->departure_date;
                    $km_terakhir = $lastReport->km_after;
                } else {
                    $tgl_terakhir = null;
                    $km_terakhir = null;
                }


                $weekCount = 0;
                $previousKm = $km_terakhir;
                $awalBulan = Carbon::create($year, $month, 1);
                $akhirBulan = $awalBulan->copy()->endOfMonth();
                $vehicleRasio = [
                    'vehicle_id' => $v->vehicle_id,
                    'tgl_terakhir' => (Carbon::parse($tgl_terakhir))->format('d/m/Y'),
                    'km_terakhir' => $km_terakhir,
                    'laporan_terbanyak' => [],
                    'total_harga' => [],
                    'total_bbm' => [],
                    'total_km' => [],
                    'rasio_bulanan' => [],
                    'rasio' => [],
                    'awalBulan' => $awalBulan,
                    'akhirBulan' => $akhirBulan
                ];
                
                $rasio = [];

                $previousReport = $lastReport;
                
                while ($awalBulan->lessThanOrEqualTo($akhirBulan)) {
                    $nomorUrutan = 0;
                    $weekCount++;
                    $reported = null;

                    $akhirMinggu = $awalBulan->copy()->endOfWeek();
                    $firstDayOfWeek = $awalBulan->copy()->startOfWeek(Carbon::SUNDAY)->toDateString();
                    $lastDayOfWeek = $akhirMinggu->copy()->endOfWeek(Carbon::SATURDAY)->toDateString();
                    $listReport = Report::where('vehicle_id', '=', $v->vehicle_id)
                                    ->where('fuel', '!=', null)
                                    ->where('fuel', '!=', 0.00)
                                    ->whereBetween('departure_date', [$firstDayOfWeek, $lastDayOfWeek])
                                    ->get();
                    if ($listReport->count() > $laporan_terbanyak) {
                        $laporan_terbanyak = $listReport->count();
                    }

                    if (!is_null($listReport)) {
                        foreach ($listReport as $lR) {
                            $arrayKlaim = null;
                            $rasioValue = 0.0;
                            $fuelTambahan = 0.00;
                            $reportFinance = ReportFinance::whereBetween('date_of_application', [$previousReport->departure_date, $lR->departure_date])
                                                            ->where('vehicle_id', '=', $lR->vehicle_id)
                                                            ->where('report_id', '!=', null)
                                                            ->get();
                            if (!is_null($reportFinance)) {
                                foreach ($reportFinance as $rf) {
                                    $fuelTambahan += $rf->fuel;
                                    $dataKlaim = [
                                        'report_finance_id' => $rf->report_finance_id,
                                        'tgl_klaim' => (Carbon::parse($rf->date_of_application))->format('d/m/Y'),
                                        'liter_klaim' => number_format($rf->fuel, 2),
                                        'remark_klaim' => $rf->remark,
                                        'report_id_terkait' => $rf->report_id,
                                        'tgl_terkait' => (Carbon::parse($rf->report->departure_date))->format('d/m/Y'),
                                        'remark_terkait' => $rf->report->remark
                                    ];
                                    $arrayKlaim[] = $dataKlaim;
                                }
                            }
                            $rasioValue = number_format(((floatval($lR->km_after - $previousKm))/($lR->fuel + $fuelTambahan)), 2);
                            $data = [
                                'tgl' => (Carbon::parse($lR->departure_date))->format('d/m/Y'),
                                'km' => $lR->km_after,
                                'qty' => str_replace('.', ',', number_format($lR->fuel, 2)),
                                'rp' => number_format($lR->fuel_cost, 0, ',', '.'),
                                'rasio' => str_replace('.', ',', $rasioValue),
                                'total_fuel_klaim' => $fuelTambahan,
                                'list_klaim' => $arrayKlaim,
                            ];
    
                            $previousKm = $lR->km_after;
                            $previousReport = $lR;

                            $total_harga += $lR->fuel_cost;
                            $total_bbm += $lR->fuel;
                            
                            $reported[] = $data;
                            $nomorUrutan++;
                        }
                    }
                    $rasio[] = [
                        'minggu ke' => $weekCount,
                        'listReport' => $reported,
                        'first' => $firstDayOfWeek,
                        'last' => $lastDayOfWeek
                    ];
                    $awalBulan->addWeek();
                    $vehicleRasio['rasio'] = $rasio;
                }

                if (!is_null($lastReport) && !is_null($previousReport)) {
                    $total_km = $previousReport->km_after - $lastReport->km_after;
                }

                if ($total_km != 0 && $total_bbm != 0.00) {
                    $rasio_bulanan = $total_km / $total_bbm;
                }

                $vehicleRasio['laporan_terbanyak'] = $laporan_terbanyak;
                $vehicleRasio['total_harga'] = number_format($total_harga, 0, ',', '.');
                $vehicleRasio['total_bbm'] = str_replace('.', ',', number_format($total_bbm, 2));
                $vehicleRasio['total_km'] = $total_km;
                $vehicleRasio['rasio_bulanan'] = str_replace('.', ',', number_format($rasio_bulanan, 2));
                $response[] = $vehicleRasio;

                $total_semua_harga += $total_harga;
                $total_semua_bbm += $total_bbm;
                $total_semua_km += $total_km;
            }


            //untuk menghitung total bbm dan harga per minggu nya untuk semua mobil
            $weeklyTotal = null;
            $awalBulan = Carbon::create($year, $month, 1);
            $akhirBulan = $awalBulan->copy()->endOfMonth();
            $weekCounter = 0;
            while ($awalBulan->lessThanOrEqualTo($akhirBulan)) {
                $weekCounter++;
                $weeklyBbm = 0.00;
                $weeklyHarga = 0;
                $akhirMinggu = $awalBulan->copy()->endOfWeek();
                $firstDayOfWeek = $awalBulan->copy()->startOfWeek(Carbon::SUNDAY)->toDateString();
                $lastDayOfWeek = $akhirMinggu->copy()->endOfWeek(Carbon::SATURDAY)->toDateString();
                $weeklyReport = Report::where('fuel', '!=', null)
                            ->where('fuel', '!=', 0.00)
                            ->whereBetween('departure_date', [$firstDayOfWeek, $lastDayOfWeek])
                            ->get();
                if (!is_null($weeklyReport)) {
                    foreach ($weeklyReport as $wR) {
                        $weeklyBbm += $wR->fuel;
                        $weeklyHarga += $wR->fuel_cost;
                        $data = [
                            'minggu_ke' => $weekCounter,
                            'total_mingguan_bbm' => str_replace('.', ',', number_format($weeklyBbm, 2)),
                            'total_mingguan_harga' => number_format($weeklyHarga, 0, ',', '.')
                        ];
                    }
                }
                $dataMingguan[] = $data;
                $awalBulan->addWeek();
            }
            $weeklyTotal = $dataMingguan;
            

            if (empty($response)) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Gagal membuat Laporan Rasio BBM. Pastikan ada Laporan Jalan yang mengisi BBM di bulan sebelumnya.',
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'status' => Response::HTTP_CREATED,
                    'success' => true,
                    'message' => 'Laporan Rasio BBM berhasil dibuat.',
                    'total_weeks' => $weekCount,
                    'total_semua_harga' => number_format($total_semua_harga, 0, ',', '.'),
                    'total_semua_bbm' => number_format($total_semua_bbm, 2),
                    'total_semua_km' => $total_semua_km,
                    'total_mingguan' => $weeklyTotal,
                    'rasio_bbm' => $response,
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'success' => false,
                'message' => 'Terjadi kesalahan internal ['. $e->getMessage() . ']',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
