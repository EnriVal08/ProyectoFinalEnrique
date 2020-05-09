<?php

use Illuminate\Database\Seeder;

class JugadoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jugadores')->insert([
            ['id_equipo' => '1',
                'nombre' => 'Thijs',
                'pais' => 'Alemania',
                'foto' => 'https://d1lss44hh2trtw.cloudfront.net/assets/article/2019/05/01/20190428-helena-kristiansson-hctworldstaipei-03428_feature.jpg'],

            ['id_equipo' => '2',
                'nombre' => 'Kolento',
                'pais' => 'Ucrania',
                'foto' => 'https://liquipedia.net/commons/images/6/65/Kolento_SSC_IX.jpg'],
        ]);
    }
}
