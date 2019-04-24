<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data', function (Blueprint $table) {
            $table->foreign('ClusterNo')->references('ClusterNo')->on('clusters');
            $table->foreign('DistrictNo')->references('DistrictNo')->on('districts');
            $table->foreign('mLGU_No')->references('mLGU_No')->on('mlgus');
            $table->foreign('BarangayNo')->references('BrgyNo')->on('barangays');
            $table->foreign('BloodTypeID')->references('BloodTypeID')->on('blood_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data', function (Blueprint $table) {
            $table->dropForeign('data_barangayno_foreign');
            $table->dropForeign('data_bloodtypeid_foreign');
            $table->dropForeign('data_clusterno_foreign');
            $table->dropForeign('data_districtno_foreign');
            $table->dropForeign('data_mlgu_no_foreign');
            $table->dropForeign('data_user_id_foreign');
        });
    }
}
