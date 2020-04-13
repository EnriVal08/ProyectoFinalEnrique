<?php

use Illuminate\Database\Seeder;

class ComentariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comentarios')->insert([
            ['descripcion' => 'asdkljh oasd asodhfo afshodphf aosdhpf',
                'id_noticia' => '1',
                'id_usuario' => '1'],

            ['descripcion' => 'sdkljh oasd asodhfo afshodphf aosdhpf',
                'id_noticia' => '1',
                'id_usuario' => '2'],

            ['descripcion' => 'asdkljh oasd asodhfo afshodphf aosdhpf',
                'id_noticia' => '3',
                'id_usuario' => '2'],

            ['descripcion' => 'asdkljh oasd asodhfo afshodphf aosdhpf',
                'id_noticia' => '4',
                'id_usuario' => '2']
        ]);
    }
}
