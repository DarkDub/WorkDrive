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
            [
                'nombre' => 'SuperAdministrador',
                'descripcion' => 'Todos los permisos',
                'padre' => 1,
            ],
            [
                'nombre' => 'Normal',
                'descripcion' => 'navegar',
                'padre' => 2,
            ],
            [
                'nombre' => 'Operador',
                'descripcion' => 'Restringido',
                'padre' => 3,
            ],
            [
                'nombre' => 'trabajador',
                'descripcion' => 'Restringido',
                'padre' => 4,
            ],
            [
                'nombre' => 'cliente',
                'descripcion' => 'Restringido',
                'padre' => 5,
            ],

        ]);

        DB::table('tipo_documentos')->insert([
            [
                'nombre' => 'C.C',
            ],
             [
                'nombre' => 'Cedula Extranjera',
            ],
             [
                'nombre' => 'Registro Civil',
            ],
             [
                'nombre' => 'Pasaporte',
            ],
        ]);
    }
}
