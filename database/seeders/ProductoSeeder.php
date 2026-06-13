<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = DB::table('categorias')->get();

        if ($categorias->count() == 0) {
            return;
        }

        DB::table('productos')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Laptop Lenovo ThinkPad',
                'description' => 'Laptop empresarial Core i7 16GB RAM',
                'price' => 3500.00,
                'stock' => 15,
                'estado' => true,
                'categoria_id' => $categorias[0]->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'iPhone 15',
                'description' => 'Smartphone Apple de última generación',
                'price' => 4500.00,
                'stock' => 10,
                'estado' => true,
                'categoria_id' => $categorias[1]->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Monitor LG 27"',
                'description' => 'Monitor Full HD IPS',
                'price' => 850.00,
                'stock' => 20,
                'estado' => true,
                'categoria_id' => $categorias[2]->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Teclado Mecánico RGB',
                'description' => 'Teclado gamer con iluminación RGB',
                'price' => 250.00,
                'stock' => 30,
                'estado' => true,
                'categoria_id' => $categorias[3]->id,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Impresora Epson L3250',
                'description' => 'Impresora multifuncional con sistema continuo',
                'price' => 950.00,
                'stock' => 12,
                'estado' => true,
                'categoria_id' => $categorias[4]->id,
            ],
        ]);
    }
}
