<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Permisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permisos')->insert([
            [
                'nombre' => 'Master',
                'descripcion' => 'Puede realizar todas las acciones',
                'estado' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Trabajadores',
                'descripcion' => 'Permiso para trabajadores',
                'estado' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Clientes',
                'descripcion' => 'Permiso para clientes',
                'estado' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
