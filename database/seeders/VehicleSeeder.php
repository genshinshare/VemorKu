<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        $users = User::where('role', 'operator')->inRandomOrder()->first();
        Vehicle::create([
            'vehicle_id' => 'BE8246OA',
            'users_id' => '1',
            'type' => 'Mitsubishi All New Triton SC',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2017,
            'engine_number' => '4D56UAM5957',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8140DY',
            'users_id' => '2',
            'type' => 'Mitsubishi Starada SC',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2010,
            'engine_number' => '4M40UAC1013',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8145DY',
            'users_id' => '1',
            'type' => 'Mitsubishi Starada SC',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2010,
            'engine_number' => '4M4OUAC2063',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8361DK',
            'users_id' => '2',
            'type' => 'Toyota Kijang Pickup',
            'department_id' => 5,
            'driver_id' => 5,
            'branch' => '31 - Lampung',
            'year_build' => 1995,
            'engine_number' => '5K9270845',
            'status' => FALSE,
            'status_remark' => 'Menunggu Approve HO untuk di Lelang',
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8102OY',
            'users_id' => '1',
            'type' => 'Mitsubishi Strada L200',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2007,
            'engine_number' => '4M40ZA2206',
            'status' => FALSE,
            'status_remark' => 'Menunggu Approve HO untuk di Lelang',
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8103OY',
            'users_id' => '2',
            'type' => 'Mitsubishi Strada L200',
            'department_id' => 5,
            'driver_id' => 5,
            'branch' => '31 - Lampung',
            'year_build' => 2007,
            'engine_number' => '4M40ZA2230',
            'status' => FALSE,
            'status_remark' => 'Menunggu Approve dari HO untuk di Lelang',
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8135DK',
            'users_id' => '1',
            'type' => 'Isuzu TBR 54 Pickup Turbo',
            'department_id' => 5,
            'driver_id' => 5,
            'branch' => '31 - Lampung',
            'year_build' => 2005,
            'engine_number' => 'E123842',
            'status' => FALSE,
            'status_remark' => 'Menunggu Approve dari HO untuk di Lelang',
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE1606DC',
            'users_id' => '2',
            'type' => 'Daihatsu Xenia',
            'department_id' => 5,
            'driver_id' => 5,
            'branch' => '31 - Lampung',
            'year_build' => 2018,
            'engine_number' => '1NRF401034',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8492DG',
            'users_id' => '1',
            'type' => 'Mitsubishi Strada SC',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2014,
            'engine_number' => '4M40UAE0857',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8493DG',
            'users_id' => '2',
            'type' => 'Mitsubishi Strada SC',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2014,
            'engine_number' => '4N40UAE1881',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8414DA',
            'users_id' => '1',
            'type' => 'Mitsubishi All New Triton SC',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2016,
            'engine_number' => '4D56UAG1940',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8431OB',
            'users_id' => '2',
            'type' => 'Mitsubishi All New Triton SC',
            'department_id' => 2,
            'driver_id' => 2,
            'branch' => '31 - Lampung',
            'year_build' => 2018,
            'engine_number' => '4D56UAV7968',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE1055ES',
            'users_id' => '1',
            'type' => 'Daihatsu Grand Max',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2008,
            'engine_number' => 'DAL8619',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8751DA',
            'users_id' => '2',
            'type' => 'Mitsubishi All New Triton SC',
            'department_id' => 2,
            'driver_id' => 2,
            'branch' => '31 - Lampung',
            'year_build' => 2016,
            'engine_number' => '4D56UAG4613',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8918OB',
            'users_id' => '1',
            'type' => 'Mitsubishi All New Triton DC',
            'department_id' => 1,
            'driver_id' => 1,
            'branch' => '31 - Lampung',
            'year_build' => 2019,
            'engine_number' => '4D56UAX1555',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8977DH',
            'users_id' => '2',
            'type' => 'Mitsubishi Strada DC',
            'department_id' => 2,
            'driver_id' => 2,
            'branch' => '31 - Lampung',
            'year_build' => 2014,
            'engine_number' => '4M40UAE1962',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8260DL',
            'users_id' => '1',
            'type' => 'Mitsubishi Strada SC',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2015,
            'engine_number' => '4M40UAF0887',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE1664DB',
            'users_id' => '2',
            'type' => 'Daihatsu Grand Max',
            'department_id' => 4,
            'driver_id' => 4,
            'branch' => '31 - Lampung',
            'year_build' => 2017,
            'engine_number' => '3SZDGJ3119',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);

        Vehicle::create([
            'vehicle_id' => 'BE8183OB',
            'users_id' => '1',
            'type' => 'Mitsubishi All New Triton SC',
            'department_id' => 3,
            'driver_id' => 3,
            'branch' => '31 - Lampung',
            'year_build' => 2018,
            'engine_number' => '4D56UAU0326',
            'status' => TRUE,
            'status_remark' => NULL,
        ]);
    }
}
