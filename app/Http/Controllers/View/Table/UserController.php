<?php

namespace App\Http\Controllers\View\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request) {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $cari = false;
        if ($request->has('halaman')) {
            $pageNumber = $request->input('halaman');
            $user = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/account?page={$pageNumber}");
        } else {
            $user = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/account");
        }
        return view('table.user.user', compact('user', 'cari'));
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $cari_akun = $request->input('cari_akun');
        $kategori = $request->input('kategori');
        $token = $request->query('_token');
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $cari = true;
        if ( $request->has('halaman')) {
            $pageNumber = $request->input('halaman');
            $user = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/account/search?cari_akun={$request->input('cari_akun')}&kategori={$request->input('kategori')}&page={$pageNumber}");
        } else {
            $user = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/account/search?cari_akun={$request->input('cari_akun')}&kategori={$request->input('kategori')}", $data);
        }
        return view('table.user.user', compact('user', 'cari', 'cari_akun', 'kategori', 'token'))->with('message', 'Pencarian Berhasil');
    }
    public function create()
    {
        return view('table.user.addUser');
    }

    public function store(Request $request)
    {
        $request->validate([
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

        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post(config('app.url') . "/api/account/store", $data);
        if ($user['status'] == 201){
            toastr()->success("Akun berhasil ditambah", "Berhasil");
        } else if ($user['status'] == 400){
            toastr()->error("Akun gagal ditambah", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/akun');
    }
    public function edit($id)
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/account/show={$id}");
        return view('table.user.editUser',compact('user'));
        
    }
    public function update($id, Request $request)
    {
        $request->validate([
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
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->put(config('app.url') . "/api/account/{$id}", $data);
        if ($user['status'] == 200){
            toastr()->success('Akun berhasil diperbarui', 'Berhasil');
        } else if ($user['status'] == 400){
            toastr()->error('Akun gagal diperbarui', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/akun');
    }
    public function destroy($id){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->delete(config('app.url') . "/api/account/delete={$id}");
        if ($user['status'] == 200){
            toastr()->success("Akun dengan nama [{$user['nama_akun']}] berhasil dihapus", "Berhasil");
        } else if ($user['status'] == 400){
            toastr()->error("Akun gagal dihapus", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/akun');
    }
}
