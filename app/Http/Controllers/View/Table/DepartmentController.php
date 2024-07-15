<?php

namespace App\Http\Controllers\View\Table;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $department = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/department");
        return view('table.department.department', compact('department'));
    }
    public function create()
    {
        return view('table.department.addDepartment');
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string',
        ], [
            'required' => 'Kolom :attribute harus diisi',
        ]);
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $department = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->post(config('app.url') . "/api/department/store", $data);
        if ($department['status'] == 201){
            toastr()->success("Department berhasil ditambah", "Berhasil");
        } else if ($department['status'] == 400){
            toastr()->error("Department gagal ditambah", "Gagal");
        } else {
            toastr()->error("Internal Server Error", "Error");
        }
        return redirect('/departemen');
    }
    public function edit($id)
    {
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $department = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->get(config('app.url') . "/api/department/show={$id}");
        return view('table.department.editDepartment',compact('department'));
        
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'department_name' => 'required|string',
        ], [
            'required' => 'Kolom :attribute harus diisi',
        ]);
        $data = $request->all();
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $department = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->put(config('app.url') . "/api/department/{$id}", $data);
        if ($department['status'] == 200){
            toastr()->success('Department berhasil diperbarui', 'Berhasil');
        } else if ($department['status'] == 400){
            toastr()->error('Department gagal diperbarui', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/departemen');
    }
    public function destroy($id){
        $now = auth()->user();
        $bearerToken = $now->api_token;
        $department = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
        ])->delete(config('app.url') . "/api/department/delete={$id}");
        if ($department['status'] == 200){
            toastr()->success("Department dengan nama [{$department['nama']}] berhasil dihapus", 'Berhasil');
        } else if ($department['status'] == 400){
            toastr()->error('Department gagal dihapus', 'Gagal');
        } else {
            toastr()->error('Internal Server Error', 'Error');
        }
        return redirect('/departemen');
    }
}
