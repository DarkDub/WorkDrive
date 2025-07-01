<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->insert([
            [
                'name' => 'Administrado Principal',
                'email' => 'Admin@example.com',
                'password' => Hash::make('Admin123'),
                'estado' => 'A',
                'role_id' => 1,
                'remember_token' => Str::random(60),
                'created_at' => now(),
                'updated_at' => now(),
    
            ]
        
        ]);
    }
}
