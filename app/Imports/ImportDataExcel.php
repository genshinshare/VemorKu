<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\SkipsUnknownSheets;
use App\Imports\ImportLogic;

class ImportDataExcel implements WithMultipleSheets, SkipsUnknownSheets
{
    public function sheets(): array
    {
        return []; // kosongin
    }

    public function onUnknownSheet($sheetName)
    {
        return new ImportLogic();
    }
}