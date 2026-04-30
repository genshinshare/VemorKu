<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ImportDataExcel implements ToCollection
{
    public function collection(Collection $rows)
    {
        dd($rows);
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