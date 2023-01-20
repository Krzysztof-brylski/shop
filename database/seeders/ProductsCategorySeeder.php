<?php

namespace Database\Seeders;

use App\Models\ProductsCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['id'=>1,'name'=>'Others'],
            ['id'=>2,'name'=>'Clothes'],
            ['id'=>3,'name'=>'Accessories'],
            ['id'=>4,'name'=>'Electronic'],
            ['id'=>5,'name'=>'Shoes'],
            ['id'=>6,'name'=>'Jewelery'],
        ];
        ProductsCategories::insert($data);
    }
}
