<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Janluy Leonardo Moreno Coronado',
                'email' => 'janluy.moreno@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('1234567890'),
                'role' => 'Administrador',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Lady Paola Alvarez Rojas',
                'email' => 'paolans25@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('1234567890'),
                'role' => 'Usuario',
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Usuario test',
                'email' => 'usuario.test@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('1234567890'),
                'role' => 'Usuario',
                'remember_token' => Str::random(10),
            ]
        ]);
    }
}
