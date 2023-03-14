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
                'product_image' => 'https://static.bmdstatic.com/pk/product/large/5efece5d53c7f.jpg',
            ]
        );

        DB::table('products')->insert(
            [
                'product_code' => 'GVBBRU',
                'product_name' => 'Giv Biru',
                'price' => 11000,
                'currency' => 'IDR',
                'unit' => 'PCS',
                'product_image' => 'https://cf.shopee.co.id/file/448727ba0063e060feba395844237ca3',
            ],
        );

        DB::table('products')->insert(
            [
                'product_code' => 'SKLINQUID',
                'product_name' => 'SO Klin Liquid',
                'price' => 18000,
                'currency' => 'IDR',
                'unit' => 'PCS',
                'product_image' => 'https://www.mirotakampus.com/resources/assets/images/product_images/1658474027.soklin%20liq%20sakura%20780.jpg',
            ],
        );
    }
}
