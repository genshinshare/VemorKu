<?php

namespace App\Http\Controllers\Api\Table;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Models\PersonalAccessToken;

class UserAPIController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('role', '!=', 'admin')->orderBy("updated_at", 'desc')->paginate(10);
            $count = User::all()->count();
            if ($users->isEmpty()){
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Tidak ada akun',
                ], Response::HTTP_NOT_FOUND);
            }
            return response()->json([
                'status' => Response::HTTP_OK,
                'success' => true,
                'message' => 'Data akun berhasil didapatkan',
                'user' => $users
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
            $keyword = $request->input('cari_akun');
            $category = $request->input('kategori');
            //filter
            if ($keyword == '') {
                $user = User::where('id', 'LIKE', '%' . $keyword . '%')
                            ->where('role', '!=', 'admin')
                            ->orderBy("created_at", 'desc')
                            ->paginate(10);
                if ($user->isEmpty()) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Tidak ada data akun',
                    ], Response::HTTP_NOT_FOUND);
                }
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Semua data akun berhasil didapatkan',
                    'user' => $user
                ], Response::HTTP_OK);
            } else {
                if ($category == 'id') {
                    $users = User::where('role', '!=', 'admin')
                            ->where('id', '=', $keyword);
                } else if ($category == 'name') {
                    $users = User::where('name', 'LIKE', '%' . $keyword . '%');
                } else if ($category == 'email') {
                    $users = User::where('email', 'LIKE', '%' . $keyword . '%');
                }
                $user = $users->orderBy("created_at", 'desc')->paginate($perPage)->appends(request()->except('page'));
                if ($user->isEmpty()) {
                    return response()->json([
                        'status' => Response::HTTP_NOT_FOUND,
                        'success' => false,
                        'message' => 'Akun tidak ditemukan',
                    ], Response::HTTP_NOT_FOUND);
                } else {
                    return response()->json([
                        'status' => Response::HTTP_OK,
                        'success' => true,
                        'message' => 'Akun berhasil didapatkan',
                        'user' => $user
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
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'confirm_password' => 'required|string|min:8',
            ], [
                'required' => 'Kolom :attribute harus diisi',
                'min' => 'Kolom :attribute minimal 8 karakter',
                'email' => ':attribute tidak valid',
                'email.unique' => 'Tidak dapat mendaftarkan email ini'
            ]);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $passwordRaw = $request->input('password');
            $passwordConfirm = $request->input('confirm_password');

            if ($passwordRaw !== $passwordConfirm) {
                return response()->json([
                    'status' => Response::HTTP_BAD_REQUEST,
                    'success' => false,
                    'message' => 'Password dan konfirmasi password tidak sesuai',
                ], Response::HTTP_BAD_REQUEST);
            }
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $passwordConfirm;
            $user->role = 'operator';
            $user->email_verified_at = Date::now();
            $user->remember_token = Str::random(10);
            $user->save();
            $token = $user->createToken('myAppToken')->plainTextToken;
            $user->api_token = $token;
            $user->save();
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'success' => true,
                'message' => 'Akun berhasil ditambahkan',
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
            $user = User::find($id);
            if ($id != 1 && $user != null) {
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Data akun berhasil didapatkan',
                    'user' => $user
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Data akun tidak ditemukan',
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
                'name' => 'required|string',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($id),
                ],
                'password' => 'nullable|string|min:8',
            ], [
                'required' => 'Kolom :attribute harus diisi',
                'min' => 'Kolom :attribute minimal 8 karakter',
                'email' => ':attribute tidak valid',
                'email.unique' => 'Tidak dapat mendaftarkan email ini'
            ]);
        
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $user = User::find($id);
            if ($id != 1 && $user->exists()) {
                $user->name = $request->name;
                $user->email = $request->email;
                if ( $request->password != null ) {
                    $user->password = Hash::make($request->password);
                }
                $user->role = 'operator';
                $user->email_verified_at = Date::now();
                $user->remember_token = Str::random(10);
                $user->save();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Akun berhasil diperbarui',
                ], Response::HTTP_OK);
            }
        } catch (\Exception $e) {
            $user = User::find($id);
            if ( $id == 1 || $user == null) {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Data akun tidak ditemukan',
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
            $user = User::find($id);
            if ($id != 1 && $user != null) {
                $token = PersonalAccessToken::where('tokenable_id', 'LIKE', '%' . $user->id . '%');
                $token->delete();
                $nama = $user->name;
                $user->delete();
                return response()->json([
                    'status' => Response::HTTP_OK,
                    'success' => true,
                    'message' => 'Data akun berhasil dihapus',
                    'nama_akun' => $nama,
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'status' => Response::HTTP_NOT_FOUND,
                    'success' => false,
                    'message' => 'Data tidak ditemukan',
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
