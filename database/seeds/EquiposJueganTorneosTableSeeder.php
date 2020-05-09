<?php

use Illuminate\Database\Seeder;

class EquiposJueganTorneosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos_juegan_torneos')->insert([
            ['id_torneo' => '1',
                'id_equipo' => '2'],

            ['id_torneo' => '2',
                'id_equipo' => '1'],
        ]);
    }
}
