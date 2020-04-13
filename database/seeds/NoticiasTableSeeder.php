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
            ['titulo' => 'Nuevo rework a Teemo',
                'descripcion' => 'asdkljh oasd asodhfo afshodphf aosdhpf',
                'fecha' => '19-February-2020',
                'foto' => 'https://1.bp.blogspot.com/-AbEpLyFeaWg/XTtj3s_gDaI/AAAAAAAAJdY/qxLuTDjEy9sfS9bFZyd92WJmisQ1uZRaQCLcBGAs/w0/teemo-lol-little-devil-splash-art-uhdpaper.com-4K-244-wp.thumbnail.jpg',
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
