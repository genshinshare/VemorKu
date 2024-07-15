<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicle';
    public $incrementing = false;
    protected $primaryKey = 'vehicle_id';

    protected $fillable = [
        'vehicle_id',
        'users_id',
        'type',
        'department_id',
        'driver_id',
        'branch',
        'year_build',
        'engine_number',
        'status',
        'status_remark',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }
}
