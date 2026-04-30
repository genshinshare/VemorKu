<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Imports\ImportLogic;

class ImportDataExcel implements WithMultipleSheets
{
    protected string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function sheets(): array
    {
        $spreadsheet = IOFactory::load($this->filePath);

        $sheets = [];

        foreach ($spreadsheet->getSheetNames() as $index => $name) {
            $sheets[$index] = new ImportLogic();
        }

        return $sheets;
    }
}