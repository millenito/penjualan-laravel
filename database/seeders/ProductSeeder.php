<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('products')->insert(
            [
                'product_code' => 'SKUSKILNP',
                'product_name' => 'SO Klin Pewangi',
                'price' => 15000,
                'currency' => 'IDR',
                'discount' => 10,
                'dimension' => '13 cm x 10 cm',
                'unit' => 'PCS',
            ],
            [
                'product_code' => 'GVBBRU',
                'product_name' => 'Giv Biru',
                'price' => 11000,
                'currency' => 'IDR',
                'unit' => 'PCS',
            ],
            [
                'product_code' => 'SKLINQUID',
                'product_name' => 'SO Klin Liquid',
                'price' => 18000,
                'currency' => 'IDR',
                'unit' => 'PCS',
            ],
        );
    }
}
