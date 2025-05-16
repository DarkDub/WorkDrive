<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rols')->insert([
            'nombre' => 'SuperAdministrador',
            'descripcion' => 'Todos los permisos',
            'padre' => 1,
        ]);


        DB::table('rols')->insert([
            'nombre' => 'Normal',
            'descripcion' => 'navegar',
            'padre' => 2,
        ]);
        DB::table('rols')->insert([
            'nombre' => 'Operador',
            'descripcion' => 'Restringido',
            'padre' => 3,
        ]);
        DB::table('rols')->insert([
            'nombre' => 'trabajador',
            'descripcion' => 'Restringido',
            'padre' => 4,
        ]);
        DB::table('rols')->insert([
            'nombre' => 'cliente',
            'descripcion' => 'Restringido',
            'padre' => 5,
        ]);
    }
}
