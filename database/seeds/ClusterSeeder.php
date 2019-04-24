<?php

use Illuminate\Database\Seeder;

class ClusterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Description' => 'CPH BALAMBAN'],
            ['Description' => 'CPH CARCAR'],
            ['Description' => 'CPH BOGO'],
            ['Description' => 'CPH DANAO'],
        ];

        DB::table('clusters')->insert($data);
    }
}
