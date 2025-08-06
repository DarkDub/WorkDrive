<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\Registro;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Database\Seeders\PermisosSeeder; // Remove this line if PermisosSeeder is in the same namespace or already autoloaded

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RolSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(MunicipioSeeder::class);
        $this->call(Clientes::class);
        $this->call(AdminUserSeeder::class);
        $this->call(profesiones::class);
        $this->call(metodos_pago::class);
        $this->call(RegistroSeeder::class);
        $this->call(Permisos::class); // Make sure PermisosSeeder.php exists in database/seeders and class name is PermisosSeeder
        
        User::factory()->create(
            [
                'name' => 'Test',
                'email' => 'test@gmail.com',
                'rol_id' => 1, // Assuming 1 is the ID for the admin role
                'registro_id' => 1, // Assuming 1 is the ID for the registro
                'password' => bcrypt('123456'),
            ]
        );
        
    }
}
