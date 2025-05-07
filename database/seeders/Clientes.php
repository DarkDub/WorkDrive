<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Clientes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'name' => 'JohnDoe',
                'nombre' => 'Juan Pérez',
                'email' => 'juan@example.com',
                'telefono' => '+573001234567',
                'direccion' => 'Calle 123 #45-67',
                'nit' => '12345678',
                'codigo_postal' => '110111',
                'pais_id' => 1,
                'departamento_id' => 1,
                'municipio_id' => 3,  // Asegúrate de que el departamento_id es válido
                'estado' => 'A',  // Aunque 'A' es el valor predeterminado, puedes especificarlo si quieres.
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'JaneSmith',
                'nombre' => 'Ana Gómez',
                'email' => 'ana@example.com',
                'telefono' => '+573002345678',
                'direccion' => 'Cra 10 #20-30',
                'nit' => '123456789',
                'codigo_postal' => '050021',
                'pais_id' => 1,
                'departamento_id' => 2,
                'municipio_id' => 3,     // Asegúrate de que el departamento_id es válido
                'estado' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'MikeBrown',
                'nombre' => 'Miguel Moreno',
                'email' => 'miguel@example.com',
                'telefono' => '+573003456789',
                'direccion' => 'Av. Siempre Viva #742',
                'nit' => '12345679',
                'codigo_postal' => '080001',
                'pais_id' => 1,
                'departamento_id' => 3,
                'municipio_id' => 3,  // Asegúrate de que el departamento_id es válido
                'estado' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
