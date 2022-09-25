<?php

namespace Database\Seeders;

use App\Models\ProductsCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'Inne'],
            ['name'=>'Ubrania'],
            ['name'=>'Akcesoria'],
        ];
        ProductsCategories::insert($data);
    }
}
