<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pais; // Asegúrate de importar el modelo Pais

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pais')->insert([
            ['id' => 1, 'pais_codigo' => '169', 'nombre' => 'Colombia']
        ]);
        
        //
    }
}
