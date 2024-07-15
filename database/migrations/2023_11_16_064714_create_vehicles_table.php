<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->string('vehicle_id', 10)->primary();

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('department');

            $table->unsignedBigInteger('driver_id');            
            $table->foreign('driver_id')->references('id')->on('driver');

            $table->string('type', 40);
            $table->string('branch', 30);
            $table->integer('year_build');
            $table->string('engine_number', 20);
            $table->boolean('status');
            $table->string('status_remark', 255)->nullable();
            $table->dropForeign(['users_id']);
            $table->dropForeign(['department_id']);
            $table->dropForeign(['driver_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        // Schema::table('vehicle', function (Blueprint $table) {
        //     $table->dropForeign(['users_id']);
        //     $table->dropForeign(['department_id']);
        //     $table->dropForeign(['driver_id']);
        // });
        Schema::dropIfExists('vehicle');
    }
}

