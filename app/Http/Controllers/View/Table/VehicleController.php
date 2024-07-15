<?php

namespace App\Http\Controllers\View\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class VehicleController extends Controller
{
    public function index(Request $request){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $cari = false;
        if ($request->has('halaman')) {
            $pageNumber = $request->input('halaman');
            $vehicle = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/vehicle?page={$pageNumber}");
        } else {
            $vehicle = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/vehicle");
        }
        return view('table.vehicle.vehicle', compact('vehicle', 'cari'));
    }
    public function search(Request $request){
        $data = $request->all();
        $cari_kendaraan = $request->input('cari_kendaraan');
        $kategori = $request->input('kategori');
        $token = $request->query('_token');
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $cari = true;
        if ( $request->has('halaman')) {
            $pageNumber = $request->input('halaman');
            $vehicle = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/vehicle/search?cari_kendaraan={$request->input('cari_kendaraan')}&kategori={$request->input('kategori')}&page={$pageNumber}");
        } else {
            $vehicle = Http::withHeaders([
                'Authorization' => 'Bearer ' . $bearerToken,
            ])->get(config('app.url') . "/api/vehicle/search?cari_kendaraan={$request->input('cari_kendaraan')}&kategori={$request->input('kategori')}", $data);
        }
        return view('table.vehicle.vehicle', compact('vehicle', 'cari', 'cari_kendaraan', 'kategori', 'token'));
    }
    public function create()
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $department = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/department");
        $driver = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/driver");
        return view('table.vehicle.addVehicle', compact('driver','department'));
    }
    public function store(Request $request)
    {
        $request->validate([
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
            'boolean' => 'Kolom :attribute hanya dapat menerima "Aktif" atau "Tidak Aktif"',
        ]);
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post(config('app.url') . "/api/vehicle/store", $data);
        if ($vehicle['status'] == 201){
            toastr()->success("Kendaraan berhasil ditambah", "Berhasil");
        } else if ($vehicle['status'] == 400){
            toastr()->error("Kendaraan gagal ditambah", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/kendaraan');
    }
    public function edit($vehicle_id)
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/vehicle/show={$vehicle_id}");
        $department = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/department");
        $driver = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/driver");
        return view('table.vehicle.editVehicle',compact('vehicle','driver','department'));
    }
    public function update($vehicle_id, Request $request)
    {
        $request->validate([
            'vehicle_id' => [
                'required',
                'string',
                'max:10',
                Rule::unique('vehicle')->ignore($vehicle_id, 'vehicle_id'),
            ],
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
            'vehicle_id.unique' => 'Kendaraan dengan :attribute tersebut sudah ada',
            'boolean' => 'Kolom :attribute hanya dapat menerima "Aktif" atau "Tidak Aktif"',
        ]);
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->put(config('app.url') . "/api/vehicle/{$vehicle_id}", $data);
        if ($vehicle['status'] == 201){
            toastr()->success('Kendaraan berhasil diperbarui', 'Berhasil');
        } else if ($vehicle['status'] == 400){
            toastr()->error('Kendaraan gagal diperbarui', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/kendaraan');
    }
    public function destroy($vehicle_id){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $vehicle = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->delete(config('app.url') . "/api/vehicle/delete={$vehicle_id}");
        if ($vehicle['status'] == 200){
            toastr()->success("Kendaraan dengan nomor polisi [{$vehicle['plat']}] berhasil dihapus", "Berhasil");
        } else if ($vehicle['status'] == 400){
            toastr()->error("Kendaraan gagal dihapus", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/kendaraan');
    }
}
