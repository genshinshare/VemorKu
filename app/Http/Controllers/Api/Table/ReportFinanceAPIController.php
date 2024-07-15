<?php

namespace App\Http\Controllers\Api\Table;

use App\Http\Controllers\Controller;
use App\Models\ReportFinance;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ReportFinanceAPIController extends Controller
{
    public function index()
    {
        try {
            $perPage = 10;
            $report_finance = ReportFinance::orderBy('updated_at', 'desc')->paginate($perPage);
            if ($report_finance->isEmpty()){
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Tidak ada Laporan Klaim',
                ], Response::HTTP_NOT_FOUND);
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'Semua Laporan Klaim berhasil didapatkan',
                'report_finance' => $report_finance
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'success' => false,
                'message' => 'Terjadi kesalahan internal [' . $e->getMessage() . ']',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function search(Request $request){
        try {
            $keyword = $request->input('cari_laporanKlaim');
            $category = $request->input('kategori');
            $vehicleSelected = $request->input('vehicleID');
            $keywordLow = strtolower($keyword);
            $perPage = 10;
            //filter
            if ($keyword == '') {
                if ($vehicleSelected == 'all') {
                    if ($request->dashboard === 'true'){
                        $report_finance = ReportFinance::orderBy("{$request->orderBy}", 'desc')->paginate($perPage);
                    } else {
                        $report_finance = ReportFinance::paginate($perPage);
                    }
                    if ($report_finance->isEmpty()){
                        return response()->json([
                            'status' => Response::HTTP_NOT_FOUND,
                            'success' => false,
                            'message' => 'Tidak ada Laporan Klaim',
                        ], Response::HTTP_NOT_FOUND);
                    }
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Semua Laporan Klaim berhasil didapatkan',
                        'report_finance' => $report_finance
                    ], Response::HTTP_OK);
                // keyword kosong namun filter vehicle
                } else {
                    $report_finances = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%')->orderBy('created_at', 'desc');
                    $report_finance = $report_finances->paginate($perPage)->appends(request()->except('page'));
                    if ( $report_finance->isEmpty() ) {
                        return response()->json([
                            'status' => Response::HTTP_NOT_FOUND,
                            'success' => false,
                            'message' => 'Laporan Klaim dengan vehicle id tersebut tidak ditemukan',
                        ], Response::HTTP_NOT_FOUND);
                    } else {
                        return response()->json([
                            'status' => Response::HTTP_OK,
                            'success' => true,
                            'message' => 'Semua Laporan Klaim dengan vehicle id tersebut berhasil didapatkan',
                            'report_finance' => $report_finance
                        ], Response::HTTP_OK);
                    }
                }
            } else if ($keywordLow == 'belum') {
                if ($category == 'fuel') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('fuel');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('fuel');
                    }
                } else if ($category == 'fuel_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('fuel_cost');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('fuel_cost');
                    }
                } else if ($category == 'report_id') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('report_id');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('report_id');
                    }
                } else if ($category == 'remark') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('remark');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('remark');
                    }
                } else if ($category == 'stnk_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('stnk_cost');
                    } else {
                        $report_financess = ReportFinance::where('stnk_cost', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('arrival_date');
                    }
                } else if ($category == 'kir_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('kir_cost');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('kir_cost');
                    }
                } else if ($category == 'repair_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('repair_cost');
                    } else {
                        $report_financess = ReportFinance::where('repair_cost', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('arrival_date');
                    }
                } else if ($category == 'maintenance_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('maintenance_cost');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('maintenance_cost');
                    }
                } else if ($category == 'carwash_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('carwash_cost');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('carwash_cost');
                    }
                } else if ($category == 'toll_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('toll_cost');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('toll_cost');
                    }
                } else if ($category == 'parking_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('parking_cost');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('parking_cost');
                    }
                } else {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::whereNull('other_cost');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->whereNull('other_cost');
                    }
                }
                $report_finance = $report_finances->paginate($perPage)->appends(request()->except('page'));
                if ( $report_finance->isEmpty() ) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Tidak ditemukan Laporan Klaim yang tidak lengkap',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Laporan Klaim yang tidak lengkap berhasil didapatkan',
                        'report_finance' => $report_finance
                    ], Response::HTTP_OK);
                }
            } else {
                $cost = str_replace(".", "", $keyword);
                $cost = str_replace(",", "", $cost);
                if ($category == 'report_finance_id') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('report_finance_id', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('report_finance_id', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'date_of_application') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('date_of_application', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('date_of_application', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'date_recorded') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('date_recorded', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('date_recorded', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'fuel') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('fuel', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('fuel', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'fuel_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('fuel_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('fuel_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'report_id') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('report_id', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('report_id', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'remark') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('remark', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('remark', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'stnk_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('stnk_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('stnk_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'kir_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('kir_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('kir_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'repair_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('repair_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('repair_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'maintenance_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('maintenance_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('maintenance_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'carwash_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('carwash_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('carwash_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'toll_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('toll_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('toll_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'parking_cost') {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('parking_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('parking_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else {
                    if ($vehicleSelected == 'all') {
                        $report_finances = ReportFinance::where('other_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $report_financess = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $report_finances = $report_financess->where('other_cost', 'LIKE', '%' . $cost . '%');
                    }
                }
                $report_finance = $report_finances->paginate($perPage)->appends(request()->except('page'));
                if ( $report_finance->isEmpty() ) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Laporan Klaim tidak ditemukan',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Laporan Klaim berhasil didapatkan',
                        'report_finance' => $report_finance
                    ], Response::HTTP_OK);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'success' => false,
                'message' => 'Terjadi kesalahan internal [' . $e->getMessage() . ']',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function searchAll(Request $request){
        try {
            $year = $request->input('year');
            $month = $request->input('month');
            $vehicleSelected = $request->input('vehicle_id');
            //filter
            $report_finance = ReportFinance::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%')
                ->whereYear('date_recorded', $year)
                ->whereMonth('date_recorded', $month)
                ->get();
            if ( $report_finance->isEmpty() ) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Laporan Klaim tidak ditemukan',
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Laporan Klaim berhasil didapatkan',
                    'report_finance' => $report_finance
                ], Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'success' => false,
                'message' => 'Terjadi kesalahan internal [' . $e->getMessage() . ']',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function show($report_finance_id) 
    {
        try {
            $report_finance = ReportFinance::find($report_finance_id);
            if ($report_finance != null) {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Laporan Klaim berhasil didapatkan',
                    'report_finance' => $report_finance
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Laporan Klaim tidak ditemukan',
                ], Response::HTTP_NOT_FOUND);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'success' => false,
                'message' => 'Terjadi kesalahan internal [' . $e->getMessage() . ']',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function store(Request $request)
    {
        try {
            if(is_null($request->report_id)) {
                $validator = Validator::make($request->all(),[
                    'vehicle_id' => 'required|string|not_in:invalid',
                    'report_id' => 'nullable|exists:report,report_id',
                    'date_recorded' => 'required|date',
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
                $validator = Validator::make($request->all(),[
                    'report_id' => 'nullable|exists:report,report_id',
                    'date_recorded' => 'required|date',
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

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $report_finance = new ReportFinance;
            $id = auth()->user()->id;
            $report_finance->users_id = $id;
            if (is_null($request->report_id)) {
                $report_finance->vehicle_id = $request->vehicle_id;
            } else {
                $report = Report::where('report_id', 'LIKE', '%' . $request->report_id . '%')->first();
                $report_finance->vehicle_id = $report->vehicle_id;
                $report_finance->report_id = $request->report_id;
            }
            $report_finance->date_recorded = $request->date_recorded;
            $report_finance->date_of_application = $request->date_of_application;
            $report_finance->fuel = $request->fuel;
            $report_finance->fuel_cost = $request->fuel_cost ?? NULL;
            $report_finance->stnk_cost = $request->stnk_cost ?? NULL;
            $report_finance->kir_cost = $request->kir_cost ?? NULL;
            $report_finance->repair_cost = $request->repair_cost ?? NULL;
            $report_finance->maintenance_cost = $request->maintenance_cost ?? NULL;
            $report_finance->carwash_cost = $request->carwash_cost ?? NULL;
            $report_finance->toll_cost = $request->toll_cost ?? NULL;
            $report_finance->parking_cost = $request->parking_cost ?? NULL;
            $report_finance->other_cost = $request->other_cost ?? NULL;
            $report_finance->remark = $request->remark ?? NULL;
            $report_finance->save();
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'success' => true,
                'message' => 'Laporan Klaim berhasil dibuat',
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            if ( $validator->fails()) {
                return response()->json([
                    'status' => Response::HTTP_BAD_REQUEST,
                    'success' => false,
                    'message' => $e->validator->errors()->all(),
                ], Response::HTTP_BAD_REQUEST);
            }
            else {
                return response()->json([
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'success' => false,
                    'message' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
    public function update($report_finance_id, Request $request)
    {
        try {
            if(is_null($request->report_id)) {
                $validator = Validator::make($request->all(),[
                    'vehicle_id' => 'required|string|not_in:invalid',
                    'report_id' => 'nullable|exists:report,report_id',
                    'date_recorded' => 'date_recorded',
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
                $validator = Validator::make($request->all(),[
                    'report_id' => 'nullable|exists:report,report_id',
                    'date_recorded' => 'required|date',
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

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $report_finance = ReportFinance::find($report_finance_id);
            $id = auth()->user()->id;
            $report_finance->users_id = $id;
            if (is_null($request->report_id)) {
                $report_finance->vehicle_id = $request->vehicle_id;
                $report_finance->report_id = $request->report_id;
            } else {
                $report = Report::where('report_id', 'LIKE', '%' . $request->report_id . '%')->first();
                $report_finance->vehicle_id = $report->vehicle_id;
                $report_finance->report_id = $request->report_id;
            }
            $report_finance->date_recorded = $request->date_recorded;
            $report_finance->date_of_application = $request->date_of_application;
            $report_finance->fuel = $request->fuel;
            $report_finance->fuel_cost = $request->fuel_cost ?? NULL;
            $report_finance->stnk_cost = $request->stnk_cost ?? NULL;
            $report_finance->kir_cost = $request->kir_cost ?? NULL;
            $report_finance->repair_cost = $request->repair_cost ?? NULL;
            $report_finance->maintenance_cost = $request->maintenance_cost ?? NULL;
            $report_finance->carwash_cost = $request->carwash_cost ?? NULL;
            $report_finance->toll_cost = $request->toll_cost ?? NULL;
            $report_finance->parking_cost = $request->parking_cost ?? NULL;
            $report_finance->other_cost = $request->other_cost ?? NULL;
            $report_finance->remark = $request->remark ?? NULL;
            $report_finance->save();
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'Laporan Klaim berhasil diperbarui',
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            if ( $validator->fails()) {
                return response()->json([
                    'status' => Response::HTTP_BAD_REQUEST,
                    'success' => false,
                    'message' => $e->validator->errors()->all(),
                ], Response::HTTP_BAD_REQUEST);
            }
            else {
                return response()->json([
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'success' => false,
                    'message' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
    public function destroy($report_finance_id)
    {
        try {
            $report_finance = ReportFinance::find($report_finance_id);
            if ($report_finance != null) {
                $reportFinanceID = $report_finance->report_finance_id;
                $report_finance->delete();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Laporan Klaim berhasil dihapus',
                    'reportFinanceID' => $reportFinanceID,
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Laporan Klaim tidak ditemukan',
                ], Response::HTTP_NOT_FOUND);
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
