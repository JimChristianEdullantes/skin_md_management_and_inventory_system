<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'CLENZIderm M.D. Pore Therapy',
            'product_description' => 'Description 1',
            'product_price' => 2970,
            'product_quantity' => 20,
            'product_critical_quantity' => 10,
        ]);

        DB::table('products')->insert([
            'product_name' => 'SUZANOBAGIMD Balancing Toner',
            'product_description' => 'Description 2',
            'product_price' => 1850,
            'product_quantity' => 20,
            'product_critical_quantity' => 10,
        ]);

        DB::table('products')->insert([
            'product_name' => 'SUZANOBAGIMD Cleansing Wipes',
            'product_description' => 'Description 3',
            'product_price' => 650,
            'product_quantity' => 20,
            'product_critical_quantity' => 10,
        ]);

        DB::table('products')->insert([
            'product_name' => 'ELASTIderm Eye Cream',
            'product_description' => 'Description 4',
            'product_price' => 5720,
            'product_quantity' => 20,
            'product_critical_quantity' => 10,
        ]);

        DB::table('products')->insert([
            'product_name' => 'Professional-C Microdermabrasion Polish + Mask',
            'product_description' => 'Description 5',
            'product_price' => 4680,
            'product_quantity' => 20,
            'product_critical_quantity' => 10,
        ]);
    }
}
