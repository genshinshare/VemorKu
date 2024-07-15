<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->id();
            $table->string('driver_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver');
    }
};
