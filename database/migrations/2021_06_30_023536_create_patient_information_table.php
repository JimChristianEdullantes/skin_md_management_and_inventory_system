<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_information', function (Blueprint $table) {
            $table->id();
            $table->string('patient_firstname', 50)->nullable();
            $table->string('patient_lastname', 50)->nullable();
            $table->string('patient_sex', 7)->nullable();
            $table->date('patient_birthdate')->nullable();
            $table->string('patient_address', 150)->nullable();
            $table->string('patient_phone_number', 12)->nullable();
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
        Schema::dropIfExists('patient_information');
    }
}
