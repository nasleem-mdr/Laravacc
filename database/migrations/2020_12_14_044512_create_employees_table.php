<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id');
            $table->foreignId('departement_id');
            $table->foreignId('user_id');
            $table->foreignId('status_id');
            $table->foreignId('burden_id');
            $table->string('name');
            $table->dateTime('date_of_birth');
            $table->string('place_of_birth');
            $table->string('addres');
            $table->foreignId('city_id');
            $table->foreignId('region_id');
            $table->foreignId('country_id');
            $table->string('phone');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
