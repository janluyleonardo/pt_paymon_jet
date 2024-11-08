<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgeRangeTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('age_ranges')->insert([
            [
                'range' => '5-8',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'range' => '9-13',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'range' => '14-16',
                'status' => true,
                'created_at' => now(),
            ],
            [
                'range' => '16+',
                'status' => true,
                'created_at' => now(),
            ]
        ]);
    }
}