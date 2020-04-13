<?php

use Illuminate\Database\Seeder;

class JuegosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('juegos')->insert([
            ['nombre' => 'Hearthstone',
                'titulo' => '¡Juega a Hearthstone, el juego de cartas de Blizzard!',
                'descripcion' => 'sdgsadf sadfg sdfg sdfg sdfgadfgSDAGSGHASDFGAD GASDGADFG',
                'foto' => 'https://throughfantasyandreality.files.wordpress.com/2016/09/hearthstone-alleria-windrunner.png',
                'video' => 'a sdfasd fasd fasd fas d'],

            ['nombre' => 'CALL OF DUTY®: MOBILE',
                'titulo' => 'El juego gratis CALL OF DUTY®: MOBILE de Activision lo tiene todo.',
                'descripcion' => 'sdgsadf sadfg sdfg sdfg sdfgadfgSDAGSGHASDFGAD GASDGADFG',
                'foto' => 'https://i11a.3djuegos.com/juegos/16515/call_of_duty_mobile/fotos/maestras/call_of_duty_mobile-5014465.jpg',
                'video' => 'asdfasdf asdfa sdfasdf asdfa sdfa sd'],

            ['nombre' => 'Brawl Stars',
                'titulo' => 'Frenéticas batallas multijugador de los creadores de Clash of Clans, Clash Royale',
                'descripcion' => 'sdgsadf sadfg sdfg sdfg sdfgadfgSDAGSGHASDFGAD GASDGADFG',
                'foto' => 'https://www.xtrafondos.com/wallpapers/brawl-stars-videojuego-3504.jpg',
                'video' => 'a sdfasdfasdf asdfasdf sadf']
        ]);
    }
}
