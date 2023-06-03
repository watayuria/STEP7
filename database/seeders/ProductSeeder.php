<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('products')->insert([
            'id' => '1',
            'product_name' => 'A',
            'price' => '100',
            'stock' => '10',
            'company_id' => '1',
        ]);

        \DB::table('products')->insert([
            'id' => '2',
            'product_name' => 'B',
            'price' => '150',
            'stock' => '10',
            'company_id' => '1',
        ]);

        \DB::table('products')->insert([
            'id' => '3',
            'product_name' => 'C',
            'price' => '200',
            'stock' => '10',
            'company_id' => '2',
        ]);

        \DB::table('products')->insert([
            'id' => '4',
            'product_name' => 'D',
            'price' => '300',
            'stock' => '10',
            'company_id' => '3',
        ]);

        \DB::table('products')->insert([
            'id' => '5',
            'product_name' => 'E',
            'price' => '500',
            'stock' => '10',
            'company_id' => '4',
        ]);
    }
}
