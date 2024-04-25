<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['pid' => 1, 'cid' => 1, 'product_name' => 'Pizza', 'qty' => 10, 'rate' => 299, 'gst' => '5%'],
            ['pid' => 2, 'cid' => 1, 'product_name' => 'Burger', 'qty' => 10, 'rate' => 399, 'gst' => '5%'],
            ['pid' => 3, 'cid' => 2, 'product_name' => 'Laptop', 'qty' => 5, 'rate' => 54999, 'gst' => '18%'],
            ['pid' => 4, 'cid' => 3, 'product_name' => 'T-Shirt', 'qty' => 50, 'rate' => 999, 'gst' => '12%'],
            ['pid' => 5, 'cid' => 2, 'product_name' => 'Keyboard', 'qty' => 20, 'rate' => 999, 'gst' => '18%'],
            ['pid' => 6, 'cid' => 3, 'product_name' => 'Sleeveless T-Shirt', 'qty' => 100, 'rate' => 599, 'gst' => '12%'],
        ]);
    }
}
