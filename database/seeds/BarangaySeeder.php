<?php

use Illuminate\Database\Seeder;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Description' => 'ANGILAN'],
            ['Description' => 'BOJO'],
            ['Description' => 'BONBON'],
            ['Description' => 'ESPERANZA'],
            ['Description' => 'KANDINGAN'],
            ['Description' => 'KANTABOGON'],
            ['Description' => 'KAWASAN'],
            ['Description' => 'OLANGO'],
            ['Description' => 'POBLACION'],
            ['Description' => 'PUNAY'],
            ['Description' => 'ROSARIO'],
            ['Description' => 'SAKSAK'],
            ['Description' => 'TAMPA-AN'],
            ['Description' => 'TOYOKON'],
            ['Description' => 'ZARAGOSA'],
        ];

        DB::table('barangays')->insert($data);
    }
}
