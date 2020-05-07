<?php

use Illuminate\Database\Seeder;

class GaleriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galeria')->insert([
            ['id_noticia' => '1',
                'foto' => 'https://d1lss44hh2trtw.cloudfront.net/assets/article/2019/05/01/20190428-helena-kristiansson-hctworldstaipei-03428_feature.jpg'],
        ]);
    }
}
