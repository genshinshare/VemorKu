<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    public function run () {
        Driver::create([
            'driver_name' => 'MARKETING'
        ]);
    
        Driver::create([
            'driver_name' => 'PARTS'
        ]);
    
        Driver::create([
            'driver_name' => 'SERVICE'
        ]);
    
        Driver::create([
            'driver_name' => 'FIN & ADM'
        ]);
    
        Driver::create([
            'driver_name' => 'PGA'
        ]);
    }
}
