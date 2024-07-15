<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('report_finance', function (Blueprint $table) {
            $table->increments('report_finance_id');


            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');

            $table->string('vehicle_id');
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicle');

            $table->unsignedInteger('report_id')->nullable();
            $table->foreign('report_id')->references('report_id')->on('report')->onDelete('cascade');

            $table->date('date_of_application');
            $table->date('date_recorded');
            $table->unsignedDecimal('fuel', 8, 2)->nullable();
            $table->unsignedInteger('fuel_cost')->nullable();
            $table->unsignedInteger('stnk_cost')->nullable();
            $table->unsignedInteger('kir_cost')->nullable();
            $table->unsignedInteger('repair_cost')->nullable();
            $table->unsignedInteger('maintenance_cost')->nullable();
            $table->unsignedInteger('carwash_cost')->nullable();
            $table->unsignedInteger('toll_cost')->nullable();
            $table->unsignedInteger('parking_cost')->nullable();
            $table->unsignedInteger('other_cost')->nullable();
            $table->string('remark', 100)->nullable();
            $table->dropForeign(['users_id']);
            $table->dropForeign(['vehicle_id']);
            $table->timestamps();
        });
    }

    public function down()
    {
        // Schema::table('report_finance', function (Blueprint $table) {
        //     $table->dropForeign(['users_id']);
        //     $table->dropForeign(['vehicle_id']);
        // });
        Schema::dropIfExists('report_finance');
    }
};
