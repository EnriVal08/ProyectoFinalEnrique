<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(NoticiasTableSeeder::class);
        $this->call(ComentariosTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(CestaTableSeeder::class);
        $this->call(EquiposTableSeeder::class);
        $this->call(JugadoresTableSeeder::class);
        $this->call(JuegosTableSeeder::class);
        $this->call(TorneosTableSeeder::class);
        $this->call(EquiposJueganTorneosTableSeeder::class);
        $this->call(GaleriaTableSeeder::class);


    }
}
