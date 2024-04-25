<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            ['id' => 1, 'category_name' => 'Food'],
            ['id' => 2, 'category_name' => 'Electronics'],
            ['id' => 3, 'category_name' => 'Apparel'],
        ]);
    }
}
