<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            ['nombre' => 'Nari Ultimate wireless - RAZER',
                'precio' => 193.90,
                'foto' => 'https://www.vsgamers.es/thumbnails/product_gallery_medium/uploads/products/razer/auriculares/auriculares-razer-nari-ultimate/galeria/auriculares-razer-nari-ultimate-galeria-4.png',
                'categoria' => 'auriculares gaming',
                'descripcion' => 'Los auriculares inalámbricos Razer Nari están diseñados para disfrutar de la máxima comodidad. La banda de sujeción autoajustable está diseñada para adaptarse perfectamente a la forma de tu cabeza y asegurar así una comodidad sin problemas. Por su parte, los auriculares giratorios incluyen unas almohadillas de gel refrigerantes.. '],

            ['nombre' => 'TECLADO GAMING MK6',
                'precio' => 59.90,
                'foto' => 'http://es.marsgaming.eu/uploads/_thumnails/mk6bes_960x960.png',
                'categoria' => 'Teclados gaming',
                'descripcion' => 'El MK6 es el teclado gaming que estabas esperando: disfruta de un teclado óptico-mecánico con iluminación CHROMA RGB diseñado para proporcionarte la pulsación más rápida y precisa que puedas imaginar. Equipado con avanzada tecnología OPTICAL-MECH y un potente software de control para configurar macros, efectos de luz y diversas funciones.'],

            ['nombre' => 'RATÓN INALÁMBRICO G502',
                'precio' => 155.00,
                'foto' => 'https://resource.logitechg.com/e_trim/w_490,h_310,c_limit/c_lpad,ar_413:310,q_auto:best,f_auto,dpr_auto/content/dam/gaming/en/products/g502-lightspeed-gaming-mouse/g502-lightspeed-gallery-1.png?v=1',
                'categoria' => 'Ratón inalámbrico',
                'descripcion' => 'El ratón inalámbrico Logitech G502 LIGHTSPEED para gaming no sólo elimina hábilmente el cable, mejora además el ya espectacular sensor y respalda este ratón de alto rendimiento con un paquete de software de grandes prestaciones. Parece que el G502 ha vuelto a lo grande']
        ]);
    }
}
