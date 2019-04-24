<?php

use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Description' => 'A-'],
            ['Description' => 'A+'],
            ['Description' => 'AB-'],
            ['Description' => 'AB+'],
            ['Description' => 'O'],
            ['Description' => 'B-'],
            ['Description' => 'B+'],
        ];

        DB::table('blood_types')->insert($data);
    }
}
