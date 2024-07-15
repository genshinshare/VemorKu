<?php

namespace App\Providers;

use App\Models\Vehicle;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('unique_primary_key', function ($attribute, $value, $parameters, $validator) {
            // Lakukan pengecekan keberadaan nilai primary key dalam basis data
            $exists = Vehicle::where($attribute, $value)->exists();
    
            // Return false jika primary key sudah ada
            return !$exists;
        });

        Validator::extend('arrival_time_after_departure', function ($attribute, $value, $parameters, $validator) {
            $departureDate = $validator->getData()['departure_date'];
            $arrivalDate = $validator->getData()['arrival_date'];
            $departureTime = $validator->getData()['departure_time'];
            $arrivalTime = $value;
        
            if ($departureDate === $arrivalDate && $arrivalTime < $departureTime) {
                return false; // Kembalikan false jika arrival_time kurang dari departure_time
            }
        
            return true;
        });
    }
}
