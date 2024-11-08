<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Desarrollo WEB',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Manualidades',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Analitica de datos',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Marketing',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'name' => 'Redes Sociales',
                'status' => true,
                'created_at' => now(),
            ]
        ]);
    }
}
