<?php

use Illuminate\Database\Seeder;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos')->insert([
            ['nombre' => 'G2 Esports',
                'logo' => 'https://www.esportsearnings.com/images/logos/l/cc7/g2-esports.png',
                'pais' => 'Alemania',
                'descripcion' => 'G2 Esports, antes conocido como Gamers2, es una organización española dedicada a los deportes electrónicos fundada en 2014 por Carlos "ocelote" Rodríguez Santiago y con sede en Berlín, Alemania.'],

            ['nombre' => 'Cloud9',
                'logo' => 'https://www.esportsearnings.com/images/logos/tm212-cloud9-2150.png',
                'pais' => 'EEUU',
                'descripcion' => 'Cloud9 (C9) es una organización estadounidense de deportes electrónicos fundada en 2013 por Jack Etienne.'],
        ]);
    }
}
