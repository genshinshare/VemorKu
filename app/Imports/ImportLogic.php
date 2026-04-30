<?php

namespace App\Imports;

use App\Models\Report;
use App\Models\ReportFinance;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;

class ImportLogic implements ToCollection, WithStartRow, WithCalculatedFormulas, WithEvents
{
    protected $sheetName;

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function ($event) {
                $this->sheetName = $event->getSheet()->getTitle();
            },
        ];
    }

    public function collection(Collection $rows)
    {
        DB::transaction(function () use ($rows) {
            $vehicleId = strtoupper(str_replace(' ', '', $this->sheetName));
            foreach($rows as $row) {
                if (empty($row[0])) { // jika tidak terdapat data (biasanya mobil stdby atau tidak digunakan lagi)
                    continue;
                }
                else {
                    $date = Date::excelToDateTimeObject($row[0])->format('Y-m-d');
                    $now = auth()->user()->id;
                    if (!empty($row[1]) && !empty($row[2])) { // menentukan apakah ada tercatat km
                        $report = Report::create([
                            'users_id' => $now,
                            'vehicle_id' => $vehicleId,
                            'departure_date' => $date,
                            'departure_time' => '00:00:00', // butuh diperbarui kode nya, sesuaikan dengan Import Car Condition
                            'km_before' => $row[1],
                            'km_after' => $row[2],
                            'fuel' => $row[4],
                            'fuel_cost' => $row[5],
                            'remark' => $row[9]
                        ]);
                    } else if (empty($row[1]) && empty($row[2])) { // tidak ada km berarti laporan klaim
                        $report_finance = ReportFinance::create([
                            'users_id' => $now,
                            'vehicle_id' => $vehicleId,
                            'date_of_application' => $date,
                            'date_of_recorded' => '2023-02-01', // butuh diperbarui kode nya, sesuaikan dengan tanggal 1 dari bulan laporan ini
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