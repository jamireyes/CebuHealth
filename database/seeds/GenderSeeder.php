<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['description' => 'Male'],
            ['description' => 'Female']
        ];

        DB::table('genders')->insert($data);
    }
}
