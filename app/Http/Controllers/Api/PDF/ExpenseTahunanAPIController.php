<?php

namespace App\Http\Controllers\Api\PDF;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportFinance;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExpenseTahunanAPIController extends Controller
{
    public function expensetahunan(Request $request){
        try {
            $vehicle = Vehicle::all();

            $response = [];

            $expense = [
                'total_vehicle' => [],
                'vehicle' => []
            ];

            $total_vehicle = $vehicle->count();
            $expense['total_vehicle'] = $total_vehicle;

            foreach ($vehicle as $v) {
                
                //inisialisasi nilai awal
                $quantityReport = 0.00;
                $quantityReportFinance = 0.00;
                $stnk = 0;
                $kir = 0;
                $repair = 0;
                $maintenance = 0;
                $carwash = 0;
                $fuel = 0;
                $toll = 0;
                $parking = 0;
                $others = 0;
                $total = 0;
                $fuelReport = 0;
                $fuelReportFinance = 0;
                $total_km = 0;

                $vehicle_id = $v->vehicle_id;
                $department = $v->department->department_name;
                $engine_number = $v->engine_number;
                $type = strtoupper($v->type);
                $year_build = $v->year_build;
                $reportKmBefore = Report::whereYear('departure_date', $request->input('year'))
                                ->where('vehicle_id', $v->vehicle_id)
                                ->orderBy('km_before', 'asc')
                                ->first();
                $reportKmAfter = Report::whereYear('arrival_date', $request->input('year'))
                                ->where('vehicle_id', $v->vehicle_id)
                                ->orderBy('km_after', 'desc')
                                ->first();

                if ($reportKmBefore === NULL) {
                    $from = 0;
                } else {
                    $from = $reportKmBefore->km_before;
                }
                
                if ($reportKmAfter === NULL) {
                    $up_to = 0;
                } else {
                    $up_to = $reportKmAfter->km_after;
                }
                
                $total_km = $up_to - $from;

                $reportFilter = Report::whereYear('departure_date', $request->input('year'))->where('vehicle_id', 'LIKE', '%' . $v->vehicle_id . '%')->get();
                $reportFinanceFilter = ReportFinance::whereYear('date_recorded', $request->input('year'))->where('vehicle_id', 'LIKE', '%' . $v->vehicle_id . '%')->get();

                $branch = $v->branch;

                //quantity dari laporan jalan (report)
                foreach ($reportFilter as $rf) {
                    $quantityReport += $rf->fuel;
                    $fuelReport += $rf->fuel_cost;
                }

                foreach ($reportFinanceFilter as $rff) {
                    $quantityReportFinance += $rff->fuel;
                    $stnk += $rff->stnk_cost;
                    $kir += $rff->kir_cost;
                    $repair += $rff->repair_cost;
                    $maintenance += $rff->maintenance_cost;
                    $carwash += $rff->carwash_cost;
                    $toll += $rff->toll_cost;
                    $parking += $rff->parking_cost;
                    $others += $rff->others_cost;
                    $fuelReportFinance += $rff->fuel_cost;
                }

                $quantity = $quantityReport + $quantityReportFinance;
                $fuel = $fuelReport + $fuelReportFinance;

                if ( $quantity === 0.00 || $total_km === 0 ) {
                    $consumption = 0.00;
                } else {
                    $consumption = floatval($total_km) / $quantity;
                }

                //total biaya
                $total = $stnk + $kir + $fuel + $repair + $maintenance + $carwash + $toll + $parking + $others;
                $vehicle = [
                    'vehicle_id' => $vehicle_id,
                    'branch' => $branch,
                    'department' => $department,
                    'engine_number' => $engine_number,
                    'type' => $type,
                    'production' => $year_build,
                    'from' => $from,
                    'up_to' => $up_to,
                    'total_km' => $total_km,
                    'quantity' => number_format($quantity, 2),
                    'consumption' => number_format($consumption, 2),
                    'stnk' => $stnk,
                    'kir' => $kir,
                    'repair' => $repair,
                    'maintenance' => $maintenance,
                    'carwash' => $carwash,
                    'fuel' => $fuel,
                    'toll' => $toll,
                    'parking' => $parking,
                    'others' => $others,
                    'total' => $total
                ];
                $expense['vehicle'][] = $vehicle;
            };

            $response = $expense;

            if (empty($response)) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Gagal membuat Expense Tahunan',
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'status' => Response::HTTP_CREATED,
                    'success' => true,
                    'message' => 'Laporan Expense Tahunan berhasil dibuat.',
                    'expense_tahunan' => $response,
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
