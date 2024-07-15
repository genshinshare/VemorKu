<?php

namespace App\Http\Controllers\Api\PDF;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Driver;
use App\Models\Report;
use App\Models\Vehicle;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarConditionAPIController extends Controller
{
    public function dateRequested(Request $request){
        try {
            $vehicle = Vehicle::all();
            $year = $request->year;
            $month = $request->month;
            if ($month == 1) {
                $bulan = 'January';
            } else if ($month == 2){
                $bulan = 'February';
            } else if ($month == 3){
                $bulan = 'March';
            } else if ($month == 4){
                $bulan = 'April';
            } else if ($month == 5){
                $bulan = 'May';
            } else if ($month == 6){
                $bulan = 'June';
            } else if ($month == 7){
                $bulan = 'July';
            } else if ($month == 8){
                $bulan = 'August';
            } else if ($month == 9){
                $bulan = 'September';
            } else if ($month == 10){
                $bulan = 'October';
            } else if ($month == 11){
                $bulan = 'November';
            } else if ($month == 12){
                $bulan = 'December';
            }
            if ($month < 10) {
                $dateStringg = "{$year}-0{$month}"; //untuk totalDays
            } else {
                $dateStringg = "{$year}-{$month}"; //untuk totalDays
            }
            
            $totalDays = Carbon::parse($dateStringg)->daysInMonth;
            $week = 0;
            $daysPerWeek = 0;
            
            $response = [];

            $dateRequested = [
                'month' => $bulan,
                'year' => $year,
                'total_days' => $totalDays,
                'total_vehicles' => $vehicle->count(),
                'week_number' => []
            ];

            for ($day = 1; $day <= $totalDays; $day++) { //filter per hari
                if ($month < 10) {
                    $dateString = "{$year}-0{$month}-{$day}"; //untuk keyword pencarian sekaligus identifikasi nama hari
                } else {
                    $dateString = "{$year}-{$month}-{$day}"; //untuk keyword pencarian sekaligus identifikasi nama hari
                }
                
                $dayName = date('l', strtotime($dateString));
                if ($dayName === "Sunday") {
                    $week++;
                    $daysPerWeek = 0;
                }
                $dayName = strtoupper(substr($dayName, 0, 3));
                $daysPerWeek++;
                $listDayReport = [
                    'date' => $day,
                    'day_name' => $dayName
                ];
                $weekNumber[$week]['daysPerWeek'] = $daysPerWeek;
                $weekNumber[$week]['days'][] = $listDayReport;
                $dateRequested['week_number'] = $weekNumber;
            }
            $response = $dateRequested;

            if (empty($response)) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Laporan tidak ditemukan',
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Laporan berhasil ditemukan',
                    'dateRequested' => $response,
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

    public function data(Request $request)
    {
        try {
            if ($request->input('month') < 10) {
                $keyword = "{$request->input('year')}-0{$request->input('month')}";
            } else {
                $keyword = "{$request->input('year')}-{$request->input('month')}";
            }
            
            $department = Department::all();
            $vehicle = Vehicle::all();
            $final_total_km = 0;
            $total_km = 0;

            $response = [];

            foreach ($department as $d) {
                $driverID = Driver::where('id', 'LIKE', '%' . $d->id . '%')->first();
                $driverName = $driverID->driver_name;
                $departmentData = [
                    'department_id' => $d->id,
                    'department_name' => $d->department_name,
                    'driver_name' => $driverName,
                    'vehicles' => [],
                    'total_vehicles' => []
                ];
                $total_vehicle = 0;
                foreach ($vehicle as $v) {
                    if ($d->id == $v->department_id) {
                        $total_vehicle++;
                        $km_awal = Report::where('vehicle_id', 'LIKE', '%' . $v->vehicle_id . '%')
                            ->where('departure_date', 'LIKE', '%' . $keyword . '%')
                            ->orderBy('km_before', 'asc')
                            ->first();
                        $km_akhir = Report::where('vehicle_id', 'LIKE', '%' . $v->vehicle_id . '%')
                            ->where('departure_date', 'LIKE', '%' . $keyword . '%')
                            ->orderBy('km_before', 'desc')
                            ->first();
                        if ($km_awal && $km_akhir) {
                            $total_km = $km_akhir->km_after - $km_awal->km_before;
                            $vehicleData = [
                                'vehicle_id' => $v->vehicle_id,
                                'km_awal' => $km_awal->km_before,
                                'km_akhir' => $km_akhir->km_after,
                                'total_km' => $total_km,
                            ];

                            $departmentData['vehicles'][] = $vehicleData;
                            $departmentData['total_vehicles'] = $total_vehicle;
                        } else {
                            $vehicleData = [
                                'vehicle_id' => $v->vehicle_id,
                                'km_awal' => 0,
                                'km_akhir' => 0,
                                'total_km' => 0
                            ];

                            $departmentData['vehicles'][] = $vehicleData;
                            $departmentData['total_vehicles'] = $total_vehicle;
                        } 
                    }
                    $final_total_km += $total_km;
                }

                $response[] = $departmentData;
            }
            if (empty($response)) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Car Condition tidak dapat dibuat',
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Car Condition berhasil dibuat',
                    'carcondition' => $response,
                    'total_department' => $department->count(),
                    'total_km' => $final_total_km
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'success' => false,
                'message' => 'Terjadi kesalahan internal [' . $e->getMessage() . ']',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function timeReport(Request $request) {
        try {
            $year = $request->year;
            $month = $request->month;
            $dateStringg = Carbon::create($year, $month, 1);
            $lastYear = 0;

            $lastDateFormatted = $dateStringg->format('Y-m-d');
            
            $totalDays = Carbon::parse($dateStringg)->daysInMonth;
            $response = [];

            $vehicle = Vehicle::all();

            foreach ($vehicle as $v) {
                $vehicleTime = [
                    'vehicle_id' => $v->vehicle_id,
                    'status' => $v->status,
                    'remark' => $v->status_remark,
                    'reportPerMonth' => []
                ];
                
                $lastReport = Report::where('vehicle_id', 'LIKE', $v->vehicle_id)
                                    ->where('departure_date', '<', $lastDateFormatted)
                                    ->orderBy('arrival_date', 'desc')
                                    ->first(); //filter sesuai tanggal bulan lalu dan kendaraan
                
                //inisialisasi
                $lastArrivalMonth = 0;
                $lastArrivalDay = 0;

                if ($lastReport != NULL) {
                    $seperateArrivalDate = explode('-', $lastReport->arrival_date);
                    $lastArrivalMonth = $seperateArrivalDate[1];
                    $lastArrivalDay = $seperateArrivalDate[2];
                }
                
                //filter apakah ada yang masih menginap di bulan lalu
                if ($lastReport != NULL && intval($lastArrivalMonth) === intval($month)) {
                    $menginap = true;
                    $selisihTanggal = 0;
                    $x = intval($lastArrivalDay) - 1; //menyesuaikan dengan sisa hari inap
                } else {
                    $menginap = false;
                    $selisihTanggal = 0;
                    $x = 0; //mereset sisa hari inap
                }
                $time_cost = 0; //inisiali dan reset timecost per kendaraan
                for ($i=1; $i <= $totalDays; $i++) { 
                    $time_cost = 0; //reset timecost per hari
                    $dateString = Carbon::create($year, $month, $i)->format('Y-m-d');
                    
                    $reportFilter = Report::where('departure_date', 'LIKE', $dateString)
                                            ->where('vehicle_id', 'LIKE', $v->vehicle_id)
                                            ->get(); //filter sesuai tanggal dan kendaraan
                    if (!empty($reportFilter)) {
                        foreach ($reportFilter as $rf) {
                            $selisihTanggalIni = 0;
                            $departureDate = 0;
                            $arrivalDate = 0;
                            $departureDate = Carbon::parse($rf->departure_date);
                            $arrivalDate = Carbon::parse($rf->arrival_date);
                            $selisihTanggalIni = $departureDate->diffInDays($arrivalDate); // mencari selisih tanggal report ini
                            if ($selisihTanggalIni > $selisihTanggal) {
                                $selisihTanggal = $selisihTanggalIni; // menyimpan selisih tanggal tertinggi
                            }
                            //menghitung departure_time
                            $arrayDepartureTime = explode(':', $rf->departure_time);
                            $mixDepartureTime = floatval($arrayDepartureTime[0]) + round(((floatval($arrayDepartureTime[1])/60)*100) / 100, 2);
                            $floatDepartureTime = $mixDepartureTime;
                            //menghitung arrival_time
                            $arrayArrivalTime = explode(':', $rf->arrival_time);
                            $mixArrivalTime = floatval($arrayArrivalTime[0]) + round(((floatval($arrayArrivalTime[1])/60)*100) / 100, 2);
                            $floatArrivalTime = $mixArrivalTime;
                            // menghitung dan membulatkan time_cost
                            $time = $floatArrivalTime - $floatDepartureTime;
                            $time_cost += intval(ceil($time));
                        }
                    }
                    if($x === 0 && $menginap === true) { //kendaraan terakhir menginap
                        $time_cost = 24;
                        $menginap = false;
                        $selisihTanggal = 0;
                    } else if ($menginap === true) { // kendaraan masih menginap
                        $time_cost = 24;
                        $x--;
                    } else if ($selisihTanggal > 0 && $menginap === false){ // kendaraan baru menginap
                        $time_cost = 24;
                        $menginap = true;
                        $x = $selisihTanggal;
                        $x--;
                    }

                    if ($time_cost > 24)
                    {
                        $time_cost = 24;
                    } else if ($time_cost === 0 && $v->status === 1) {
                        $time_cost = 'STBY';
                    } else if ($v->status === 0) {
                        $time_cost = 'X';
                    }
                    $timeCost = [
                        'tanggal' => $i,
                        'time_cost' => $time_cost
                    ];
                    $vehicleTime['reportPerMonth'][] = $timeCost;
                }
                $response[] = $vehicleTime;
            }

            if (empty($response)) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Timecost Report tidak dapat dibuat',
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Timecost Report berhasil dibuat',
                    'reportTime' => $response
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'success' => false,
                'message' => 'Terjadi kesalahan internal [' . $e->getMessage() . ']',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
