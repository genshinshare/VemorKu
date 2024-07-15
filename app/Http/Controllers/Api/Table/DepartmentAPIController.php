<?php

namespace App\Http\Controllers\Api\Table;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DepartmentAPIController extends Controller
{
    public function index()
    {
        try {
            $department = Department::all();
            if ($department->isEmpty()){
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Tidak ada departemen',
                ], Response::HTTP_NOT_FOUND);
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'List departemen berhasil didapatkan',
                'department' => $department
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
                'department_name' => 'required|string',
            ], [
                'required' => 'Kolom :attribute harus diisi',
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $department = new Department;
            $department->department_name = $request->department_name;
            $department->save();
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'success' => true,
                'message' => 'Departemen berhasil ditambahkan',
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
            $department = Department::find($id);
            if ($department != null) {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Departemen berhasil didapatkan',
                    'department' => $department
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Departemen tidak ditemukan',
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
                'department_name' => 'required|string',
            ], [
                'required' => 'Kolom :attribute harus diisi',
            ]);
        
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $department = Department::find($id);
            if ($department != NULL) {
                $department->department_name = $request->department_name;
                $nama = $department->name;
                $department->save();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => "Departemen dengan [{$id}] berhasil diperbarui dengan nama [{$nama}]",
                ], Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            $department = Department::find($id);
            if ($department == null) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Departemen tidak ditemukan',
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
            $department = Department::find($id);
            if ($department != null) {
                $nama = $department->department_name;
                $department->delete();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => "Departemen berhasil dihapus",
                    'nama' => $nama,
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => "Departemen tidak ditemukan",
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
