<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        Department::create([
            'department_name' => 'MARKETING'
        ]);

        Department::create([
            'department_name' => 'SPARE PARTS'
        ]);

        Department::create([
            'department_name' => 'SERVICE'
        ]);

        Department::create([
            'department_name' => 'F & A'
        ]);

        Department::create([
            'department_name' => 'HR & GA'
        ]);
    }
}
