<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Laptops',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Celulares',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Monitores',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Accesorios',
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Impresoras',
            ],
        ]);
    }
}
