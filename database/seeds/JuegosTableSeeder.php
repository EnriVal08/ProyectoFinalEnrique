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
                'descripcion' => 'De los creadores de Overwatch® y World of Warcraft® llega HEARTHSTONE®, el aclamado juego de cartas coleccionables de Blizzard Entertainment. Colecciona poderosas cartas y crea potentes mazos. Invoca esbirros y lanza hechizos para controlar unos campos de batalla en constante cambio. Ejecuta una estrategia maestra y derrota a los jugadores que se atrevan a desafiarte.

Experimenta con la magia, el engaño y el caos junto a tus amigos. Enfréntate a ellos y únete a millones de jugadores de todo el mundo en Hearthstone. ¿A qué esperas? ¡DESCÁRGATELO HOY MISMO!

UN UNIVERSO DE WARCRAFT EN CONSTANTE EXPANSIÓN. Configura tu mazo para utilizar los esbirros y hechizos más increíbles. Busca el poder y desata al cazador de demonios que llevas dentro en Cenizas de Terrallende, resucita a Galakrond, el padre de todos los dragonantes, en El Descenso de los Dragones, acompaña a la Liga de Expedicionarios en Salvadores de Uldum y pásate al lado oscuro con la Liga del MAL en El Auge de las Sombras.

DERROTA A TUS ENEMIGOS Y LUCHA POR LA GLORIA. Domina tu mazo y lleva a cabo poderosas combinaciones en este juego de cartas rebosante de emoción y estrategia. Hazte con el control de los campos de batalla de Azeroth y vive un deslumbrante combate JcJ en tiempo real.',
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
