<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataEntryUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_entry_users', function (Blueprint $table) {
            $table->bigIncrements('DataEntryUser_ID');
            $table->bigInteger('Cluster_No')->nullable();
            $table->bigInteger('District_No')->nullable();
            $table->bigInteger('mLGU_No')->nullable();
            $table->bigInteger('Barangay_No')->nullable();
            $table->string('LName')->nullable();
            $table->string('FName')->nullable();
            $table->string('MI')->nullable();
            $table->date('Birthdate')->nullable();
            $table->boolean('Gender')->nullable(); // 1 = Male | 0 = Female
            $table->unsignedTinyInteger('Weight_kg')->nullable();
            $table->unsignedTinyInteger('Height_cm')->nullable();
            $table->bigInteger('BloodType_ID')->nullable();
            $table->bigInteger('Contact_No')->nullable();
            $table->string('House_No')->nullable();
            $table->string('Street_Name')->nullable();
            $table->string('Sitio')->nullable();
            $table->string('Purok')->nullable();
            $table->string('Barangay')->nullable();
            $table->boolean('Status')->nullable(); // 1 = Online | 0 = Offline
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
        Schema::dropIfExists('data_entry_users');
    }
}
