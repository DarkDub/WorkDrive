<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class metodos_pago extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metodo_pago')->insert(
            [
                ['nombre' => 'nequi', 'icono' => 'logos:nequi-icon'],
                ['nombre' => 'Efectivo', 'icono' => 'mdi:cash'],
                ['nombre' => 'Transferencia', 'icono' => 'logos:bancolombia-icon']
            ]
            );
    }
}
