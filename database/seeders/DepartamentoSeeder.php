<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departamentos')->insert([

            ['dpto_codigo' => '05', 'nombre' => 'ANTIOQUIA', 'pais_id' => '1'],
            ['dpto_codigo' => '08', 'nombre' => 'ATLÁNTICO', 'pais_id' => '1'],
            ['dpto_codigo' => '11', 'nombre' => 'BOGOTÁ, D.C.', 'pais_id' => '1'],
            ['dpto_codigo' => '13', 'nombre' => 'BOLÍVAR', 'pais_id' => '1'],
            ['dpto_codigo' => '15', 'nombre' => 'BOYACÁ', 'pais_id' => '1'],
            ['dpto_codigo' => '17', 'nombre' => 'CALDAS', 'pais_id' => '1'],
            ['dpto_codigo' => '18', 'nombre' => 'CAQUETÁ', 'pais_id' => '1'],
            ['dpto_codigo' => '19', 'nombre' => 'CAUCA', 'pais_id' => '1'],
            ['dpto_codigo' => '20', 'nombre' => 'CESAR', 'pais_id' => '1'],
            ['dpto_codigo' => '23', 'nombre' => 'CÓRDOBA', 'pais_id' => '1'],
            ['dpto_codigo' => '25', 'nombre' => 'CUNDINAMARCA', 'pais_id' => '1'],
            ['dpto_codigo' => '27', 'nombre' => 'CHOCÓ', 'pais_id' => '1'],
            ['dpto_codigo' => '41', 'nombre' => 'HUILA', 'pais_id' => '1'],
            ['dpto_codigo' => '44', 'nombre' => 'LA GUAJIRA', 'pais_id' => '1'],
            ['dpto_codigo' => '47', 'nombre' => 'MAGDALENA', 'pais_id' => '1'],
            ['dpto_codigo' => '50', 'nombre' => 'META', 'pais_id' => '1'],
            ['dpto_codigo' => '52', 'nombre' => 'NARIÑO', 'pais_id' => '1'],
            ['dpto_codigo' => '54', 'nombre' => 'NORTE DE SANTANDER', 'pais_id' => '1'],
            ['dpto_codigo' => '63', 'nombre' => 'QUINDÍO', 'pais_id' => '1'],
            ['dpto_codigo' => '66', 'nombre' => 'RISARALDA', 'pais_id' => '1'],
            ['dpto_codigo' => '68', 'nombre' => 'SANTANDER', 'pais_id' => '1'],
            ['dpto_codigo' => '70', 'nombre' => 'SUCRE', 'pais_id' => '1'],
            ['dpto_codigo' => '73', 'nombre' => 'TOLIMA', 'pais_id' => '1'],
            ['dpto_codigo' => '76', 'nombre' => 'VALLE DEL CAUCA', 'pais_id' => '1'],
            ['dpto_codigo' => '81', 'nombre' => 'ARAUCA', 'pais_id' => '1'],
            ['dpto_codigo' => '85', 'nombre' => 'CASANARE', 'pais_id' => '1'],
            ['dpto_codigo' => '86', 'nombre' => 'PUTUMAYO', 'pais_id' => '1'],
            ['dpto_codigo' => '88', 'nombre' => 'SAN ANDRÉS Y PROVIDENCIA', 'pais_id' => '1'],
            ['dpto_codigo' => '91', 'nombre' => 'AMAZONAS', 'pais_id' => '1'],
            ['dpto_codigo' => '94', 'nombre' => 'GUAINÍA', 'pais_id' => '1'],
            ['dpto_codigo' => '95', 'nombre' => 'GUAVIARE', 'pais_id' => '1'],
            ['dpto_codigo' => '97', 'nombre' => 'VAUPÉS', 'pais_id' => '1'],
            ['dpto_codigo' => '99', 'nombre' => 'VICHADA', 'pais_id' => '1']
            //
        ]);
    }
}
