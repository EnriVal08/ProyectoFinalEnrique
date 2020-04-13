<?php

use Illuminate\Database\Seeder;

class CestaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cesta')->insert([
            ['id_producto' => '1',
                'id_usuario' => '1'],

            ['id_producto' => '3',
                'id_usuario' => '1'],
        ]);
    }
}
