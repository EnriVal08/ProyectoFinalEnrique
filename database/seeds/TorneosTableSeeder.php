<?php

use Illuminate\Database\Seeder;

class TorneosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('torneos')->insert([
           ['titulo' => 'Brawl Stars Championship 3v3',
                'id_juego' => '3',
                'foto' => 'https://lacongeladora.com/wp-content/uploads/2020/02/br.jpg',
                'fecha' => '09/06/2020 - 11:00 AM',
                'ubicacion' => 'Katowice, Polonia',
                'descripcion' => 'Torneo de brawl stars global',
                'premio' => 25000],

            ['titulo' => 'Hearthstone Torneo Europa',
                'id_juego' => '1',
                'foto' => 'https://i11c.3djuegos.com/juegos/9766/hearthstone_heroes_of_warcraft/fotos/maestras/hearthstone_heroes_of_warcraft-3548890.jpg',
                'fecha' => '20/12/2020 - 08:00 AM',
                'ubicacion' => 'Múnich, Alemania',
                'descripcion' => 'Los mejores jugadores de Europa se reunen este Diciembre para competir por ese premio de 100.000€ y por el título de campeón de Europa',
                'premio' => 100000],

            ['titulo' => 'Call of Duty Mobile Torneo Global 5v5',
                'id_juego' => '2',
                'foto' => 'https://www.xtrafondos.com/wallpapers/call-of-duty-mobile-4007.jpg',
                'fecha' => '01/11/2020 - 06:00 PM',
                'ubicacion' => 'Madrid, España',
                'descripcion' => 'Primer torneo de Call of Duty Mobile que repartirá 250.000€ en metálico y que reunirá a los mejores jugadores de call of duty en dispositivos móviles',
                'premio' => 250000],
        ]);
    }
}
