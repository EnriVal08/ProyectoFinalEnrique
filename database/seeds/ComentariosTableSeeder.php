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
                'nombre_usuario' => 'PEPE',
                'email_usuario' => 'enrique@gmail.com'],


            ['descripcion' => 'sdkljh oasd asodhfo afshodphf aosdhpf',
                'id_noticia' => '1',
                'nombre_usuario' => 'PEPE',
                'email_usuario' => 'pepito@gmail.com'],

            ['descripcion' => 'asdkljh oasd asodhfo afshodphf aosdhpf',
                'id_noticia' => '3',
                'nombre_usuario' => 'PEPE',
                'email_usuario' => 'pepe@gmail.com']
        ]);
    }
}
