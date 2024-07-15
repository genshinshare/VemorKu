<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('report_id');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->string('vehicle_id');
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicle');

            $table->date('departure_date');
            $table->time('departure_time');
            $table->date('arrival_date')->nullable();
            $table->time('arrival_time')->nullable();
            $table->unsignedInteger('km_before');
            $table->unsignedInteger('km_after')->nullable();
            $table->unsignedDecimal('fuel', 8, 2)->nullable();
            $table->unsignedInteger('fuel_cost')->nullable();
            $table->string('remark', 100);
            $table->dropForeign(['users_id']);
            $table->dropForeign(['vehicle_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('report');
    }
}
