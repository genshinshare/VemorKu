<?php

namespace App\Http\Controllers\Api\Table;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class ReportAPIController extends Controller
{
    public function index()
    {
        try {
            $perPage = 10;
            $report = Report::orderBy('updated_at','desc')->paginate($perPage);
            if ($report->isEmpty()){
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Tidak ada laporan',
                ], Response::HTTP_NOT_FOUND);
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'Semua laporan berhasil didapatkan',
                'report' => $report
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
            $keyword = $request->input('cari_laporan');
            $category = $request->input('kategori');
            $vehicleSelected = $request->input('vehicleID');
            $keywordLow = strtolower($keyword);
            $perPage = 10;
            //filter
            if ($keyword == '') {
                if ($vehicleSelected == 'all') {
                    if ($request->dashboard === 'true'){
                        $report = Report::orderBy("{$request->orderBy}", 'desc')->paginate($perPage);
                    } else {
                        $report = Report::paginate($perPage);
                    }
                    if ($report->isEmpty()){
                        return response()->json([
                            'status' => Response::HTTP_NOT_FOUND,
                            'success' => false,
                            'message' => 'Tidak ada laporan',
                        ], Response::HTTP_NOT_FOUND);
                    }
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Semua laporan berhasil didapatkan',
                        'report' => $report
                    ], Response::HTTP_OK);
                // keyword kosong namun filter vehicle
                } else {
                    $reports = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                    $report = $reports->paginate($perPage)->appends(request()->except('page'));
                    if ( $report->isEmpty() ) {
                        return response()->json([
                            'status' => Response::HTTP_NOT_FOUND,
                            'success' => false,
                            'message' => 'Laporan dengan vehicle id tersebut tidak ditemukan',
                        ], Response::HTTP_NOT_FOUND);
                    } else {
                        return response()->json([
                            'status' => Response::HTTP_OK,
                            'success' => true,
                            'message' => 'Semua laporan dengan vehicle id tersebut berhasil didapatkan',
                            'report' => $report
                        ], Response::HTTP_OK);
                    }
                }
            } else if ($keywordLow == 'belum') {
                if ($category == 'arrival_date') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::whereNull('arrival_date');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->whereNull('arrival_date');
                    }
                } else if ($category == 'arrival_time') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::whereNull('arrival_time');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->whereNull('arrival_time');
                    }
                } else if ($category == 'km_after') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::whereNull('km_after');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->whereNull('km_after');
                    }
                } else if ($category == 'fuel') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::whereNull('fuel');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->whereNull('fuel');
                    }
                } else if ($category == 'fuel_cost') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::whereNull('fuel_cost');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->whereNull('fuel_cost');
                    }
                } else if ($category == 'remark') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::whereNull('remark');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->whereNull('remark');
                    }
                }
                $report = $reports->paginate($perPage)->appends(request()->except('page'));
                if ( $report->isEmpty() ) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Tidak ditemukan laporan yang tidak lengkap',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Laporan yang tidak lengkap berhasil didapatkan',
                        'report' => $report
                    ], Response::HTTP_OK);
                }
            } else {
                $cost = str_replace(".", "", $keyword);
                $cost = str_replace(",", "", $cost);
                if ($category == 'report_id') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('report_id', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('report_id', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'departure_date') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('departure_date', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('departure_date', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'departure_time') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('departure_time', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('departure_time', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'arrival_date') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('arrival_date', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('arrival_date', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'arrival_time') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('arrival_time', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('arrival_time', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'km_before') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('km_before', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('km_before', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'km_after') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('km_after', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('km_after', 'LIKE', '%' . $keyword . '%');
                    };
                } else if ($category == 'fuel') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('fuel', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('fuel', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'fuel_cost') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('fuel_cost', 'LIKE', '%' . $cost . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('fuel_cost', 'LIKE', '%' . $cost . '%');
                    }
                } else if ($category == 'remark') {
                    if ($vehicleSelected == 'all') {
                        $reports = Report::where('remark', 'LIKE', '%' . $keyword . '%');
                    } else {
                        $reportss = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%');
                        $reports = $reportss->where('remark', 'LIKE', '%' . $keyword . '%');
                    }
                }
                $report = $reports->paginate($perPage)->appends(request()->except('page'));
                if ( $report->isEmpty() ) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Laporan tidak ditemukan',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Laporan berhasil didapatkan',
                        'report' => $report
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

            $dateString = Carbon::create($year, $month)->format('Y-m');
            
            $vehicleSelected = $request->input('vehicle_id');
            //filter
            $report = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%')
                            ->where('departure_date', 'LIKE', '%' . $dateString . '%')
                            ->orderBy('km_before', 'asc')
                            ->get();
            
            $dateStringFull = Carbon::create($year, $month, 1)->format('Y-m-d');
            $repord = Report::where('vehicle_id', 'LIKE', '%' . $vehicleSelected . '%')
                            ->where('departure_date', '<' ,$dateStringFull)->orderBy('km_after', 'desc')
                            ->first();

            if ( $report->isEmpty() ) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Laporan tidak ditemukan',
                    'lastReport' => $repord
                ], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Laporan berhasil didapatkan',
                    'report' => $report,
                    'lastReport' => $repord
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
    public function show($report_id) 
    {
        try {
            $report = Report::find($report_id);
            if ($report != null) {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Laporan berhasil didapatkan',
                    'report' => $report
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Laporan tidak ditemukan',
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
            $validator = Validator::make($request->all(),[
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

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $report = new Report;
            $id = auth()->user()->id;
            $report->users_id = $id;
            $report->vehicle_id = $request->vehicle_id;
            $report->departure_date = $request->departure_date;
            $report->departure_time = $request->departure_time;
            $report->arrival_date = $request->arrival_date ?? NULL;
            $report->arrival_time = $request->arrival_time ?? NULL;
            $report->km_before = $request->km_before;
            $report->km_after = $request->km_after ?? NULL;
            $report->fuel = $request->fuel;
            $report->fuel_cost = $request->fuel_cost ?? NULL;
            $report->remark = $request->remark ?? NULL;
            $report->save();
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'success' => true,
                'message' => 'Laporan berhasil dibuat',
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
    public function update($report_id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
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

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $report = Report::find($report_id);
            $id = auth()->user()->id;
            $report->users_id = $id;
            $report->vehicle_id = $request->vehicle_id;
            $report->departure_date = $request->departure_date;
            $report->departure_time = $request->departure_time;
            $report->arrival_date = $request->arrival_date ?? NULL;
            $report->arrival_time = $request->arrival_time ?? NULL;
            $report->km_before = $request->km_before;
            $report->km_after = $request->km_after ?? NULL;
            $report->fuel = $request->fuel;
            $report->fuel_cost = $request->fuel_cost ?? NULL;
            $report->remark = $request->remark ?? NULL;
            $report->save();
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'Laporan berhasil diperbarui',
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
    public function destroy($report_id)
    {
        try {
            $report = Report::find($report_id);
            if ($report != null) {
                $reportID = $report->report_id;
                $report->delete();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Laporan berhasil dihapus',
                    'reportID' => $reportID,
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Laporan tidak ditemukan',
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
