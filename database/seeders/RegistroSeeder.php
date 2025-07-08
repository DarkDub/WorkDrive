<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registro;
use App\Models\DatosTrabajador;
use App\Models\estado;

class RegistroSeeder extends Seeder
{
public function run()
{
    // Estados
    estado::insert([
        ['nombre' => 'Activo'],
        ['nombre' => 'Inactivo'],
        ['nombre' => 'pendiente'],
        ['nombre' => 'verificado'],
        ['nombre' => 'realizado'],
        ['nombre' => 'en proceso'],
    ]);

    $nombres = [
        ['Carlos', 'Pérez'],
        ['Laura', 'Gómez'],
        ['Juan', 'Rodríguez'],
        ['María', 'Torres'],
        ['Luis', 'Martínez'],
        ['Ana', 'Hernández'],
        ['Jorge', 'García'],
        ['Lucía', 'Ramírez'],
        ['Andrés', 'López'],
        ['Valentina', 'Castro'],
        ['Mateo', 'Suárez'],
        ['Camila', 'Morales'],
        ['Diego', 'Vega'],
        ['Sofía', 'Díaz'],
        ['Esteban', 'Ortega'],
        ['Daniela', 'Núñez'],
        ['Sebastián', 'Reyes'],
        ['Isabella', 'Silva'],
        ['Tomás', 'Mendoza'],
        ['Manuela', 'Cabrera'],
    ];

    $profesiones = [1, 2, 3, 4];
    $tipo_documento = [1, 2, 3, 4];

    foreach ($nombres as $index => [$nombre, $apellido]) {
        $rolId = rand(4, 5);

        $registro = Registro::create([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => '300123' . str_pad($index, 4, '0', STR_PAD_LEFT),
            'email' => strtolower($nombre) . $index . '@ejemplo.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password123'),
            'latitud' => 10.640 + ($index * 0.001),
            'longitud' => -74.760 + ($index * 0.001),
            'rol_id' => $rolId,
            'pais_id' => 1,
            'departamento_id' => rand(1, 25),
            'municipio_id' => rand(1, 25),
            'codigo_postal' => rand(100000, 999999),
        ]);

        if ($rolId == 4) {
            DatosTrabajador::create([
                'registro_id' => $registro->id,
                'profesion_id' => $profesiones[$index % count($profesiones)],
                'nombre' => $nombre . ' ' . $apellido,
                'tipo_documento' => $tipo_documento[$index % count($tipo_documento)],
                'numero_documento' => '1000' . str_pad($index, 4, '0', STR_PAD_LEFT),
                'hoja_vida' => 'hoja_vida_' . $index . '.pdf',
            ]);
        }
    }
}
}
