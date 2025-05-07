<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class profesiones extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profesiones')->insert([
            ['nombre' => 'Plomero', 'descripcion' => 'Arregla tuberias', 'estado' => 'A', 'icono' => 'fluent:person-wrench-20-filled'],
            ['nombre' => 'Diseñador Grafico', 'descripcion' => 'Diseña elementos visuales', 'estado' => 'A', 'icono' => 'icon-park-outline:graphic-stitching-four'],
            ['nombre' => 'Analista de Datos', 'descripcion' => 'Analiza y interpreta datos', 'estado' => 'A', 'icono' => 'icon-park-outline:data-user'],
            ['nombre' => 'Albañil', 'descripcion' => 'realiza labores de hogar', 'estado' => 'A', 'icono' => 'healthicons:construction-worker']
        ]);
    }
}
