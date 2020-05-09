<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            ['nombre' => 'Enrique',
            'email' => 'enriquevalverde45@gmail.com',
            'contraseña' => bcrypt('12345678'),
            'rol' => 'admin',
            'avatar' => 'imagenes/avatarDefault.jpg'],

            ['nombre' => 'Pepe',
                'email' => 'pepe1234@gmail.com',
                'contraseña' => bcrypt('98765432'),
                'rol' => 'cliente',
                'avatar' => 'imagenes/elmoAvatar.jpg']
        ]);
    }
}
