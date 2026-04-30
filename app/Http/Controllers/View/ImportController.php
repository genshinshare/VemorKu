<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportDataExcel;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('import');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_input' => 'required|file|mimes:xlsx,xls,csv|max:2048'
        ], [
            'required' => 'Kolom :attribute harus diisi.',
            'file' => 'Kolom :attribute harus berupa file.',
            'file_input.mimes' => 'Kolom :attribute hanya menerima Excel (xlsx, xls, atau csv).',
            'file_input.max' => 'Size terlalu besar. Max 2 MB.'
        ]);
        dd($request->file('file_input'));
        try {
        Excel::import(new ImportDataExcel, $request->file('file_input'));
            return back()->with('success', 'Data berhasil diimport!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
