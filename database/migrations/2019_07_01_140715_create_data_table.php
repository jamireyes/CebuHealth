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
            $table->bigInteger('User_ID');
            $table->bigInteger('ClusterNo');
            $table->bigInteger('DistrictNo');
            $table->bigInteger('mLGU_No');
            $table->bigInteger('BarangayNo');
            $table->string('LName');
            $table->string('FName');
            $table->string('MI');
            $table->date('Birthdate');
            $table->boolean('Gender');
            $table->unsignedTinyInteger('Weight_kg');
            $table->unsignedTinyInteger('Height_cm');
            $table->bigInteger('BloodTypeID');
            $table->bigInteger('Contact_No');
            $table->string('House_No');
            $table->string('Street_Name');
            $table->string('Sitio');
            $table->string('Purok');
            $table->string('Barangay');
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key Constraints
            // $table->foreign('User_ID')->references('id')->on('users')->onDelete('cascade');
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
