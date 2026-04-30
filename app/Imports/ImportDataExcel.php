<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Imports\ImportLogic;

class ImportDataExcel implements WithMultipleSheets
{
    public function __construct()
    {
        dd('ImportDataExcel jalan');
    }

    public function sheets(): array
    {
        return [];
    }

    public function onUnknownSheet($sheetName)
    {
        return new ImportLogic($sheetName);
    }
    // public function sheets(): array
    // {
    //     return [];
    // }

    // public function onUnknownSheet($sheetName)
    // {
    //     return new ImportLogic($sheetName);
    // }
}