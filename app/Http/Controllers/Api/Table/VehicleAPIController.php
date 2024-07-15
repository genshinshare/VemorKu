<?php

namespace App\Http\Controllers\Api\Table;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Department;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class VehicleAPIController extends Controller
{
    public function index()
    {
        try {
            $perPage = 10;
            $vehicle = Vehicle::orderBy("updated_at", 'desc')->paginate($perPage);
            $department = Department::all();
            $driver = Driver::all();
            if ($vehicle->isEmpty()) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Tidak ada data kendaraan',
                ], Response::HTTP_NOT_FOUND);
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'Semua data kendaraan berhasil didapatkan',
                'vehicle' => $vehicle,
                'department' => $department,
                'driver' => $driver
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'success' => false,
                'message' => 'Terjadi kesalahan internal [' . $e->getMessage() . ']',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
    public function indexAll(Request $request)
    {
        try {
            $orderBy = $request->orderBy;
            if ($request->dashboard === 'true'){
                $vehicle = Vehicle::orderBy("{$orderBy}", 'desc')->get();
            } else {
                $vehicle = Vehicle::orderBy("created_at", 'desc')->get();
            }
            $count = $vehicle->count();
            $department = Department::all();
            $driver = Driver::all();
            if ($vehicle->isEmpty()) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Tidak ada data kendaraan',
                ], Response::HTTP_NOT_FOUND);
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'Semua data kendaraan berhasil didapatkan',
                'total_vehicle' => $count,
                'vehicle' => $vehicle,
                'department' => $department,
                'driver' => $driver,
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
            $perPage = 10;
            $keyword = $request->input('cari_kendaraan');
            $category = $request->input('kategori');
            $keywordLow = strtolower($keyword);
            $department = Department::all();
            $driver = Driver::all();
            //filter
            if ($keyword == '') {
                $vehicle = Vehicle::orderBy("created_at", 'desc')->paginate(10);
                if ($vehicle->isEmpty()) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Tidak ada data kendaraan',
                    ], Response::HTTP_NOT_FOUND);
                }
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Semua data kendaraan berhasil didapatkan',
                    'vehicle' => $vehicle,
                    'department' => $department,
                    'driver' => $driver
                ], Response::HTTP_OK);
            } else if ($keywordLow == 'belum') {
                $vehicles = Vehicle::whereNull('status_remark')->orderBy("created_at", 'desc');
                $vehicle = $vehicles->paginate($perPage)->appends(request()->except('page'));
                if ($vehicle->isEmpty()) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Semua data kendaraan sudah lengkap',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Kendaraan yang tidak lengkap berhasil didapatkan',
                        'vehicle' => $vehicle,
                        'department' => $department,
                        'driver' => $driver
                    ], Response::HTTP_OK);
                }
            } else {
                if ($category == 'vehicle_id') {
                    $vehicles = Vehicle::where('vehicle_id', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'type') {
                    $vehicles = Vehicle::where('type', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'department_name') {
                    $department_name = Department::where('department_name', 'LIKE', '%' . $keywordLow . '%')->first();
                    $department_id = $department_name->id;
                    $vehicles = Vehicle::where('department_id', 'LIKE', '%' . $department_id . '%');
                } else if ($category == 'driver_name') {
                    $driver_name = Driver::where('driver_name', 'LIKE', '%' . $keywordLow . '%')->first();
                    $driver_id = $driver_name->id;
                    $vehicles = Vehicle::where('driver_id', 'LIKE', '%' . $driver_id . '%');
                } else if ($category == 'branch') {
                    $vehicles = Vehicle::where('branch', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'year_build') {
                    $vehicles = Vehicle::where('year_build', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'engine_number') {
                    $vehicles = Vehicle::where('engine_number', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'status') {
                    $word = strtolower($keyword);
                    $keylow = ucfirst($word);
                    if ($keylow == 'Aktif' || $keylow =='On' || $keylow =='Beroperasi') {
                        $key = 1;
                        $vehicles = Vehicle::where('status', 'LIKE', '%' . $key . '%');
                    } else if ($keylow == 'TidakAktif' || $keylow =='Tidak' || $keylow =='Rusak' || $keylow == 'Lelang'){
                        $key = 0;
                        $vehicles = Vehicle::where('status', 'LIKE', '%' . $key . '%');
                    } else {
                        $vehicles = Vehicle::where('status', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'status_remark') {
                    $vehicles = Vehicle::where('status_remark', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'account') {
                    $keywordFormat = ucwords($keyword);
                    $akun = User::where('name', 'LIKE', '%' . $keywordFormat . '%')->first();
                    $vehicles = Vehicle::where('users_id', 'LIKE', '%' . $akun->id . '%');
                }
                $vehicle = $vehicles->orderBy("created_at", 'desc')->paginate($perPage)->appends(request()->except('page'));
                if ($vehicle->isEmpty()) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Kendaraan tidak ditemukan',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Kendaraan berhasil didapatkan',
                        'vehicle' => $vehicle,
                        'department' => $department,
                        'driver' => $driver
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
            $keyword = $request->input('cari_kendaraan');
            $category = $request->input('kategori');
            $keywordLow = strtolower($keyword);
            $department = Department::all();
            $driver = Driver::all();
            //filter
            if ($keyword == '') {
                $vehicle = Vehicle::orderBy("created_at", 'desc')->get();
                if ($vehicle->isEmpty()) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Tidak ada data kendaraan',
                    ], Response::HTTP_NOT_FOUND);
                }
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Semua data kendaraan berhasil didapatkan',
                    'vehicle' => $vehicle,
                    'department' => $department,
                    'driver' => $driver
                ], Response::HTTP_OK);
            } else if ($keywordLow == 'belum') {
                $vehicles = Vehicle::whereNull('status_remark')->orderBy("created_at", 'desc');
                $vehicle = $vehicles->get();
                if ($vehicle->isEmpty()) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Semua data kendaraan sudah lengkap',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Kendaraan yang tidak lengkap berhasil didapatkan',
                        'vehicle' => $vehicle,
                        'department' => $department,
                        'driver' => $driver
                    ], Response::HTTP_OK);
                }
            } else {
                if ($category == 'vehicle_id') {
                    $vehicles = Vehicle::where('vehicle_id', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'type') {
                    $vehicles = Vehicle::where('type', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'department_name') {
                    $department_name = Department::where('department_name', 'LIKE', '%' . $keywordLow . '%')->first();
                    $department_id = $department_name->id;
                    $vehicles = Vehicle::where('department_id', 'LIKE', '%' . $department_id . '%');
                } else if ($category == 'driver_name') {
                    $driver_name = Driver::where('driver_name', 'LIKE', '%' . $keywordLow . '%')->first();
                    $driver_id = $driver_name->id;
                    $vehicles = Vehicle::where('driver_id', 'LIKE', '%' . $driver_id . '%');
                } else if ($category == 'branch') {
                    $vehicles = Vehicle::where('branch', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'year_build') {
                    $vehicles = Vehicle::where('year_build', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'engine_number') {
                    $vehicles = Vehicle::where('engine_number', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'status') {
                    $word = strtolower($keyword);
                    $keylow = ucfirst($word);
                    if ($keylow == 'Aktif' || $keylow =='On' || $keylow =='Beroperasi') {
                        $key = 1;
                        $vehicles = Vehicle::where('status', 'LIKE', '%' . $key . '%');
                    } else if ($keylow == 'TidakAktif' || $keylow =='Tidak' || $keylow =='Rusak' || $keylow == 'Lelang'){
                        $key = 0;
                        $vehicles = Vehicle::where('status', 'LIKE', '%' . $key . '%');
                    } else {
                        $vehicles = Vehicle::where('status', 'LIKE', '%' . $keyword . '%');
                    }
                } else if ($category == 'status_remark') {
                    $vehicles = Vehicle::where('status_remark', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'account') {
                    $keywordFormat = ucwords($keyword);
                    $akun = User::where('name', 'LIKE', '%' . $keywordFormat . '%')->first();
                    $vehicles = Vehicle::where('users_id', 'LIKE', '%' . $akun->id . '%');
                }
                $vehicle = $vehicles->orderBy("created_at", 'desc')->get();
                if ($vehicle->isEmpty()) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Kendaraan tidak ditemukan',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Kendaraan berhasil didapatkan',
                        'vehicle' => $vehicle,
                        'department' => $department,
                        'driver' => $driver
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
    public function show($vehicle_id) 
    {
        try {
            $vehicle = Vehicle::find($vehicle_id);
            $department = Department::all();
            $driver = Driver::all();
            if ($vehicle != null) {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Kendaraan berhasil didapatkan',
                    'vehicle' => $vehicle,
                    'department' => $department,
                    'driver' => $driver
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Kendaraan tidak ditemukan',
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
                'vehicle_id' => 'required|string|max:10|unique:vehicle,vehicle_id',
                'type' => 'required|string|max:40',
                'department_id' => 'required|integer',
                'driver_id' => 'required|integer',
                'branch' => 'required|string|max:30',
                'year_build' => 'required|integer',
                'engine_number' => 'required|string|max:20',
                'status' => 'required|boolean',
                'status_remark' => 'nullable|string',
                'users_id' => 'exists:users,id',
            ], [
                'required' => 'Kolom :attribute harus diisi',
                'integer' => 'Kolom :attribute harus berupa angka',
                'branch.max' => 'Kolom :attribute maksimal memiliki panjang 30 karakter',
                'vehicle_id.max' => 'Kolom :attribute maksimal memiliki panjang 10 karakter',
                'type.max' => 'Kolom :attribute maksimal memiliki panjang 40 karakter',
                'engine_number.max' => 'Kolom :attribute maksimal memiliki panjang 20 karakter',
                'users_id.exists' => 'User dengan ID yang diberikan tidak ditemukan',
                'vehicle_id.unique' => 'Kendaraan dengan nomor polisi :attribute sudah ada',
                'boolean' => 'Kolom :attribute hanya bisa diisi 1 untuk "Aktif" dan 0 untuk "Tidak Aktif"',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $vehicle = new Vehicle;
            $vehicle->vehicle_id = $request->vehicle_id;
            $id = auth()->user()->id;
            $vehicle->users_id = $id;
            $vehicle->type = $request->type;
            $vehicle->department_id = $request->department_id;
            $vehicle->driver_id = $request->driver_id;
            $vehicle->branch = $request->branch;
            $vehicle->year_build = $request->year_build;
            $vehicle->engine_number = $request->engine_number;
            $vehicle->status = $request->status;
            $vehicle->status_remark = $request->status_remark ?? NULL;
            $vehicle->save();
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'success' => true,
                'message' => 'Kendaraan berhasil ditambahkan',
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
                    'message' => 'Terjadi kesalahan internal [' . $e->getMessage() . ']',
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
    public function update($vehicle_id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'vehicle_id' => [
                    'required',
                    'string',
                    'max:10',
                    Rule::unique('vehicle')->ignore($vehicle_id, 'vehicle_id'),
                ],
                'type' => 'required|string|max:40',
                'department_id' => 'required|string',
                'driver_id' => 'required|string',
                'branch' => 'required|string|max:30',
                'year_build' => 'required|integer',
                'engine_number' => 'required|string|max:20',
                'status' => 'required|boolean',
                'status_remark' => 'nullable|string',
                'users_id' => 'exists:users,id',
            ], [
                'required' => 'Kolom :attribute harus diisi',
                'integer' => 'Kolom :attribute harus berupa angka',
                'branch.max' => 'Kolom :attribute maksimal memiliki panjang 30 karakter',
                'vehicle_id.max' => 'Kolom :attribute maksimal memiliki panjang 10 karakter',
                'type.max' => 'Kolom :attribute maksimal memiliki panjang 40 karakter',
                'engine_number.max' => 'Kolom :attribute maksimal memiliki panjang 20 karakter',
                'users_id.exists' => 'User dengan ID yang diberikan tidak ditemukan',
                'vehicle_id.unique' => 'Kendaraan dengan :attribute tersebut sudah ada',
                'boolean' => 'Kolom :attribute hanya bisa diisi 1 untuk "Aktif" dan 0 untuk "Tidak Aktif"',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $vehicle = Vehicle::find($vehicle_id);
            $vehicle->vehicle_id = $request->vehicle_id;
            $id = auth()->user()->id;
            $vehicle->users_id = $id;
            $vehicle->type = $request->type;
            $vehicle->department_id = $request->department_id;
            $vehicle->driver_id = $request->driver_id;
            $vehicle->branch = $request->branch;
            $vehicle->year_build = $request->year_build;
            $vehicle->engine_number = $request->engine_number;
            $vehicle->status = $request->status;
            $vehicle->status_remark = $request->status_remark ?? NULL;
            $vehicle->save();
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'success' => true,
                'message' => 'Kendaraan berhasil diperbarui',
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
    public function destroy($vehicle_id)
    {
        try {
            $vehicle = Vehicle::find($vehicle_id);
            if ($vehicle != null) {
                $plat = $vehicle->vehicle_id;
                $vehicle->delete();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Kendaraan berhasil dihapus',
                    'plat' => $plat,
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Kendaraan tidak ditemukan',
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
