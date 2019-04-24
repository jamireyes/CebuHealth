<?php

use Illuminate\Database\Seeder;

class mLGUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Description' => 'ALCANTARA'],
            ['Description' => 'ALCOY'],
            ['Description' => 'ALEGRIA'],
            ['Description' => 'ALOGUINSAN'],
            ['Description' => 'ARGAO 1'],
            ['Description' => 'ARGAO 2'],
            ['Description' => 'ASTURIAS'],
            ['Description' => 'BADIAN 1'],
            ['Description' => 'BADIAN 2'],
            ['Description' => 'BALAMBAN 1'],
            ['Description' => 'BALAMBAN 2'],
            ['Description' => 'BALAMBAN 3'],
            ['Description' => 'BANTAYAN 1'],
            ['Description' => 'BANTAYAN 2'],
            ['Description' => 'BARILI 1'],
            ['Description' => 'BARILI 2'],
            ['Description' => 'BOGO CITY'],
            ['Description' => 'BOLJOON'],
            ['Description' => 'BORBON'],
            ['Description' => 'CARCAR CITY'],
            ['Description' => 'CARMEN'],
            ['Description' => 'CATMON'],
            ['Description' => 'COMPOSTELA'],
            ['Description' => 'CONSOLACION'],
            ['Description' => 'CORDOVA'],
            ['Description' => 'DANAO CITY'],
            ['Description' => 'DAANBANTAYAN 1'],
            ['Description' => 'DAANBANTAYAN 2'],
            ['Description' => 'DALAGUTE 1'],
            ['Description' => 'DALAGUETE 2 '],
            ['Description' => 'DUMANJUG'],
            ['Description' => 'GINATILAN'],
            ['Description' => 'LILOAN'],
            ['Description' => 'MADRIDEJOS'],
            ['Description' => 'MALABUYOC'],
            ['Description' => 'MEDELLIN'],
            ['Description' => 'MINGLANILLA 1'],
            ['Description' => 'MINGLANILLA 2'],
            ['Description' => 'MOALBOAL'],
            ['Description' => 'NAGA CITY'],
            ['Description' => 'OSLOB'],
            ['Description' => 'PILAR'],
            ['Description' => 'PINAMUNGAJAN'],
            ['Description' => 'PORO'],
            ['Description' => 'RONDA'],
            ['Description' => 'SAMBOAN'],
            ['Description' => 'SAN FERNANDO'],
            ['Description' => 'SAN FRANCISCO'],
            ['Description' => 'SAN REMIGIO'],
            ['Description' => 'STA. FE'],
            ['Description' => 'SANTANDER'],
            ['Description' => 'SIBONGA'],
            ['Description' => 'SOGOD'],
            ['Description' => 'TABOGON'],
            ['Description' => 'TABUELAN'],
            ['Description' => 'TALISAY CITY'],
            ['Description' => 'TOLEDO CITY'],
            ['Description' => 'TUBURAN 1'],
            ['Description' => 'TUBURAN 2'],
            ['Description' => 'TUDELA'],
        ];

        DB::table('mlgus')->insert($data);
    }
}
