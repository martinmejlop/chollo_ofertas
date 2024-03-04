<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CholloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_chollo')->insert([
            'titulo' => 'Nike Sportswear AIR FORCE 1',
            'descripcion' => 'Zapatilla deportiva para cualquier circunstancia',
            'url' => 'https://www.zalando.es/nike-sportswear-air-force-1-zapatillas-blackdark-team-redsummit-whitewhite-ni112o0yb-q11.html',
            'categoria' => 'Calzado',
            'puntuacion' => 8,
            'precio' => 129.95,
            'precio_descuento' => 97.95,
            'disponible' => true
        ]);

        DB::table('table_chollo')->insert([
            'titulo' => 'SAMSUNG Q70A QE55Q70AAT 139,7 CM (55") 4K ULTRA HD SMART TV NEGRO',
            'descripcion' => 'Televisor QLED 4K de 55 pulgadas',
            'url' => 'https://www.bazarelregalo.com/imagen-y-sonido/television/televisores-de-109-22-a-149-86-cms-de-43-a-59/televisor-qled-samsung-qe55q70a-ultra-hd-4k.html',
            'categoria' => 'Televisiones',
            'puntuacion' => 7.5,
            'precio' => 999,
            'precio_descuento' => 649.30,
            'disponible' => true
        ]);

        DB::table('table_chollo')->insert([
            'titulo' => 'IPHONE 13 128GB AZUL',
            'descripcion' => 'Dispositivo movil con tecnología 5G y 6.1 pulgadas',
            'url' => 'https://allzone.es/smartphones/407862-smartphones-iphone-13-128gb-azul-706771-0194252708279.html',
            'categoria' => 'Móvil',
            'puntuacion' => 9,
            'precio' => 778.64,
            'precio_descuento' => 529.47,
            'disponible' => false
        ]);

        DB::table('table_chollo')->insert([
            'titulo' => 'Xiaomi Redmi Note 12 Pro',
            'descripcion' => 'Dispositivo movil con tecnología 5G y 6.67 pulgadas',
            'url' => 'https://zecuma.com/telefonia-smartphones/72209-smartphone-xiaomi-redmi-note-12-pro-8gb-256gb-6-67-5g-purpura-6941812758687.html',
            'categoria' => 'Móvil',
            'puntuacion' => 6,
            'precio' => 355,
            'precio_descuento' => 282.17,
            'disponible' => true
        ]);

        DB::table('table_chollo')->insert([
            'titulo' => 'MyKronoz MKZESPORT2W ZESPORT2',
            'descripcion' => 'Reloj multideporte versátil y elegante que sigue tu actividad diaria en tiempo real',
            'url' => 'https://www.amazon.es/dp/B07RGLHF9Z?m=A1AT7YVPFBWXBL&tag=wwwidealoes-21&ascsubtag=2024-03-04_4b5e3a1501c8259073c155d87f61c8ee4a8a8ade8fbc635088859c071fa64e81&th=1&psc=1',
            'categoria' => 'Reloj',
            'puntuacion' => 6.5,
            'precio' => 33,
            'precio_descuento' => 19.63,
            'disponible' => true
        ]);

        DB::table('table_chollo')->insert([
            'titulo' => 'Control. Jogos Asus Rog Raikiri Pro',
            'descripcion' => 'Mando enfocado a videojuegos sobre cualquier plataforma',
            'url' => 'https://www.worten.es/productos/control-jogos-asus-rog-raikiri-pro-7797659?utm_source=idealo&utm_medium=compradores&utm=campaign=compare',
            'categoria' => 'Videojuegos',
            'puntuacion' => 7,
            'precio' => 188.60,
            'precio_descuento' => 109.33,
            'disponible' => true
        ]);
    }
}
