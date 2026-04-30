<?php

namespace App\Imports;

use App\Models\Report;
use App\Models\ReportFinance;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportLogic implements ToCollection, WithStartRow
{
    protected $sheetName;

    public function __construct($sheetName = null)
    {
        $this->sheetName = $sheetName;
    }

    public function collection(Collection $rows)
    {
        dd($rows->first());
        DB::transaction(function () use ($rows) {
            $vehicleId = strtoupper(str_replace(' ', '', $this->sheetName));
            foreach($rows as $row) {
                if (empty(trim($row[0]))) { // jika tidak terdapat data (biasanya mobil stdby atau tidak digunakan lagi)
                    break;
                } 
                else {
                    if (!empty($row[1]) && !empty($row[2])) { // menentukan apakah ada tercatat km
                        $report = Report::create([
                            'vehicle_id' => $vehicleId,
                            'departure_date' => $row[0],
                            'km_before' => $row[1],
                            'km_after' => $row[2],
                            'fuel' => $row[4],
                            'fuel_cost' => $row[5],
                            'remark' => $row[9]
                        ]);
                    } else if (empty($row[1]) && empty($row[2])) { // tidak ada km berarti laporan klaim
                        $report_finance = ReportFinance::create([
                            'vehicle_id' => $vehicleId,
                            'date_of_application' => $row[0],
                            'fuel' => $row[4],
                            'fuel_cost' => $row[5],
                            'maintenance_cost' => $row[6],
                            'other_cost' => $row[8],
                            'remark' => $row[9]
                        ]);
                    }
                }
            }
        });
    }

    public function startRow(): int // dimulai dari baris 12
    {
        return 12;
    }
}