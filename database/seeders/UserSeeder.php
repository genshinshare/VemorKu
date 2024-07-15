<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Tri Sugito',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);
        $tokenAdmin = $admin->createToken('myAppToken')->plainTextToken;
        $admin->api_token = $tokenAdmin;
        $admin->save();

        $operator = User::create([
            'name' => 'Andreas',
            'email' => 'kanojowakawaii.arn@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'Operator',
            'remember_token' => Str::random(10),
        ]);
        $tokenOperator = $operator->createToken('myAppToken')->plainTextToken;
        $operator->api_token = $tokenOperator;
        $operator->save();
    }
}
