<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->bigIncrements('Data_ID');
            $table->bigInteger('User_ID')->nullable();
            $table->bigInteger('ClusterNo')->nullable();
            $table->bigInteger('DistrictNo')->nullable();
            $table->bigInteger('mLGU_No')->nullable();
            $table->bigInteger('BarangayNo')->nullable();
            $table->string('LName')->nullable();
            $table->string('FName')->nullable();
            $table->string('MI')->nullable();
            $table->date('Birthdate')->nullable();
            $table->boolean('Gender')->nullable();
            $table->unsignedTinyInteger('Weight_kg')->nullable();
            $table->unsignedTinyInteger('Height_cm')->nullable();
            $table->bigInteger('BloodTypeID')->nullable();
            $table->bigInteger('Contact_No')->nullable();
            $table->string('House_No')->nullable();
            $table->string('Street_Name')->nullable();
            $table->string('Sitio')->nullable();
            $table->string('Purok')->nullable();
            $table->string('Barangay')->nullable();
            $table->boolean('Status')->default('1');
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('User_ID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
