<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Description' => 'ARGAO DH'],
            ['Description' => 'BADIAN DH'],
            ['Description' => 'BALAMBAN DH'],
            ['Description' => 'BANTAYAN DH'],
            ['Description' => 'BARILI DH'],
            ['Description' => 'BOGO CPH'],
            ['Description' => 'CARCAR CPH'],
            ['Description' => 'DANAO CPH'],
            ['Description' => 'DAAN BANTAYAN DH'],
            ['Description' => 'MALABUYOC DH'],
            ['Description' => 'MINGLANILLA DH'],
            ['Description' => 'PINAMUNGAJAN DH'],
            ['Description' => 'OSLOB DH'],
            ['Description' => 'SAN FRANCISCO DH'],
            ['Description' => 'SOGOD DH'],
            ['Description' => 'TUBURAN DH'],
        ];

        DB::table('districts')->insert($data);
    }
}
