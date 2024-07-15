<?php

namespace App\Http\Controllers\Api\Table;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DriverAPIController extends Controller
{
    public function index()
    {
        try {
            $driver = Driver::all();
            if ($driver->isEmpty()){
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Tidak ada driver',
                ], Response::HTTP_NOT_FOUND);
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'List driver berhasil didapatkan',
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
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'driver_name' => 'required|string',
            ], [
                'required' => 'Kolom :attribute harus diisi',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $driver = new Driver;
            $driver->driver_name = $request->driver_name;
            $driver->save();
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'success' => true,
                'message' => 'Driver berhasil ditambahkan',
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
    public function show($id) 
    {
        try {
            $driver = Driver::find($id);
            if ($driver != null) {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Driver berhasil didapatkan',
                    'driver' => $driver
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Driver tidak ditemukan',
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
    public function update($id, Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'driver_name' => 'required|string',
            ], [
                'required' => 'Kolom :attribute harus diisi',
            ]);
        
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $driver = Driver::find($id);
            if ($driver->exists()) {
                $driver->driver_name = $request->driver_name;
                $nama = $driver->name;
                $driver->save();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => "Driver dengan [{$id}] berhasil diperbarui dengan nama [{$nama}]",
                ], Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            $driver = Driver::find($id);
            if ($driver == null) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Driver tidak ditemukan',
                ], Response::HTTP_NOT_FOUND);
            } else if ($validator->fails()) {
                return response()->json([
                    'status' => Response::HTTP_BAD_REQUEST,
                    'success' => false,
                    'message' => $e->validator->errors()->all(),
                ], Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'success' => false,
                    'message' => $e->getMessage(),
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
    public function destroy($id)
    {
        try {
            $driver = Driver::find($id);
            if ($driver != null) {
                $nama = $driver->driver_name;
                $driver->delete();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => "Driver berhasil dihapus",
                    'nama' => $nama,
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => "Driver tidak ditemukan",
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
