<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'report';

    protected $primaryKey = 'report_id';

    protected $fillable = [
        'users_id',
        'vehicle_id',
        'departure_date',
        'departure_time',
        'arrival_date',
        'arrival_time',
        'km_before',
        'km_after',
        'fuel',
        'fuel_cost',
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
}
