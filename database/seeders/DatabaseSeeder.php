<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
                'name' => 'Test',
                'email' => 'test@gmail.com',
                'rol_id' => 1, // Assuming 1 is the ID for the admin role
                'registro_id' => 1, // Assuming 1 is the ID for the registro
                'password' => bcrypt('123456'),
            ]
        );
        $this->call(RolSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(Permisos::class);
        $this->call(profesiones::class);
        $this->call(metodos_pago::class);
        $this->call(RegistroSeeder::class);
    }
}
