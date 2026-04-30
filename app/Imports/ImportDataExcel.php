<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use App\Imports\ImportLogic;

class ImportDataExcel implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [];
    }

    public function onUnknownSheet($sheetName)
    {
        return new ImportLogic($sheetName);
    }
}