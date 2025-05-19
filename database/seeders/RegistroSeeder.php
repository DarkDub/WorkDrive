<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registro;
use App\Models\DatosTrabajador;

class RegistroSeeder extends Seeder
{
    public function run()
    {
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
        ];

        $profesiones = [1, 2, 3, 4]; 
        $tipo_documento = [1, 2, 3, 4]; 

        foreach ($nombres as $index => [$nombre, $apellido]) {
            $registro = Registro::create([
                'nombre' => $nombre,
                'apellido' => $apellido,
                'telefono' => '30012345' . str_pad($index, 2, '0', STR_PAD_LEFT),
                'email' => strtolower($nombre) . $index . '@ejemplo.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'latitud' => 10.640 + ($index * 0.001),
                'longitud' => -74.760 + ($index * 0.001),
                'rol_id' => 4, // Suponiendo que el rol_id 2 es "trabajador"
            ]);

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
