<?php

namespace App\Http\Controllers\View\Table;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index() {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $driver = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/driver");
        return view('table.driver.driver', compact('driver'));
    }
    public function create()
    {
        return view('table.driver.addDriver');
    }

    public function store(Request $request)
    {
        $request->validate([
            'driver_name' => 'required|string',
        ], [
            'required' => 'Kolom :attribute harus diisi',
        ]);
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $driver = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post(config('app.url') . "/api/driver/store", $data);
        if ($driver['status'] == 201){
            toastr()->success("Driver berhasil ditambah", "Berhasil");
        } else if ($driver['status'] == 400){
            toastr()->error("Driver gagal ditambah", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/driver');
    }
    public function edit($id)
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $driver = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/driver/show={$id}");
        return view('table.driver.editDriver',compact('driver'));
        
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'driver_name' => 'required|string',
        ], [
            'required' => 'Kolom :attribute harus diisi',
        ]);
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $driver = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->put(config('app.url') . "/api/driver/{$id}", $data);
        if ($driver['status'] == 200){
            toastr()->success('Driver berhasil diperbarui', 'Berhasil');
        } else if ($driver['status'] == 400){
            toastr()->error('Driver gagal diperbarui', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/driver');
    }
    public function destroy($id){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $driver = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->delete(config('app.url') . "/api/driver/delete={$id}");
        if ($driver['status'] == 200){
            toastr()->success("Driver dengan nama [{$driver['nama']}] berhasil dihapus", 'Berhasil');
        } else if ($driver['status'] == 400){
            toastr()->error('Driver gagal dihapus', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/driver');
    }
}
