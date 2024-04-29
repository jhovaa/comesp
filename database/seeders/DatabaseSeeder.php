<?php

namespace Database\Seeders;

use App\Models\Formulario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create(
            [
                'name' => 'Administrador',
                'email' => 'jenny.choque@naabol.com',
                'password' =>  Hash::make('020477'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        User::create(
            [
                'name' => 'Administrador',
                'email' => 'jhovani37@gmail.com',
                'password' =>  Hash::make('5775naabol'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        // Formulario::factory()->count(10)->create();
    }
}
