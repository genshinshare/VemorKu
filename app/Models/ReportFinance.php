<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportFinance extends Model
{
    protected $table = 'report_finance';

    protected $primaryKey = 'report_finance_id';

    protected $fillable = [
        'users_id',
        'report_id',
        'vehicle_id',
        'date_recorded',
        'date_of_application',
        'fuel',
        'fuel_cost',
        'stnk_cost',
        'kir_cost',
        'repair_cost',
        'maintenance_cost',
        'carwash_cost',
        'toll_cost',
        'parking_cost',
        'other_cost',
        'remark',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id','vehicle_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'report_id');
    }

}
