<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noticias')->insert([
            ['titulo' => 'Call of Duty: Mobile 6º temporada, estas son las novedades',
                'descripcion' =>

            'Call of Duty Mobile inicia su sexta temporada con Once Upon a Time in Rust, una nueva actualización que añade múltiples novedades a la versión para dispositivos móviles de la popular saga de Activision. El juego, desarrollado en colaboración con Tencent, se coloca el sombrero de vaquero para ofrecer a los jugadores una temática del Salvaje Oeste. La ley del más fuerte se traslada a los soldados, que vestirán y utilizarán armas de esa época.

                La nueva temporada ya está disponible tanto en terminales Android cpmo en iOS, como ha anunciado la propia Activision a través de una nota de prensa. Durante este período, podremos disfrutar de personajes como Ghost cowboy y Seraph Desperada. Además, se añade el rifle de francotirador Outlaw y la MSMC del Salvaje Oeste. Como nueva habilidad de operador en el Pase de Batalla, se incluye Annihilator, procedente de Call of Duty: Black Ops IV.',
                'fecha' => '4 de mayo de 2020',
                'foto' => 'https://i.ytimg.com/vi/UVbXHqKYgqk/maxresdefault.jpg',
                'id_creador' => 1],

            ['titulo' => 'Hearthstone Bankyugi vs xBlizes',
                'descripcion' => 'sdkljh oasd asodhfo afshodphf aosdhpf',
                'fecha' => '10-July-2020',
                'foto' => 'https://i.pinimg.com/originals/a5/18/5f/a5185f1c4a0e636e63c8b25c08213fd9.jpg',
                'id_creador' => 1],

            ['titulo' => 'Tft llega a dispositivos móviles',
                'descripcion' => 'asdkljh oasd asodhfo afshodphf aosdhpf',
                'fecha' => '17-March-2020',
                'foto' => 'https://pbs.twimg.com/media/ESNJvMVWkAAwE2s.jpg',
                'id_creador' => 1],

            ['titulo' => 'El nuevo brawler se llama Sprout',
                'descripcion' => 'asdkljh oasd asodhfo afshodphf aosdhpf',
                'fecha' => '11-April-2020',
                'foto' => 'https://i.ytimg.com/vi/elnHfBCePyc/maxresdefault.jpg',
                'id_creador' => 1]
        ]);
    }
}
