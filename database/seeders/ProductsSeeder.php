<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hoodies
        products::firstOrcreate(array(
            'name'=>'Bluza z kapturem',
            'description'=>'Zwykła elegacnka bluza z kapturem',
            'image'=>'products/hoodie1.jpg',
            'amount'=>200,
            'price'=>99.99,
            'category_id'=>2,
        ));
        products::firstOrcreate(array(
            'name'=>'Modna bluza z kapturem',
            'description'=>'Modna i wygodna bluza z kapturem',
            'image'=>'products/hoodie2.jpg',
            'amount'=>100,
            'price'=>150.99,
            'category_id'=>2,
        ));
        products::firstOrcreate(array(
            'name'=>'Modna i stylowa bluza z kapturem',
            'description'=>'Modna, stylowa i wygodna bluza z kapturem',
            'image'=>'products/hoodie3.jpg',
            'amount'=>25,
            'price'=>300.00,
            'category_id'=>2,
        ));
        //tshirts
        products::firstOrcreate(array(
            'name'=>'niebieska koszulka',
            'description'=>'Zwykła elegacnka koszulka',
            'image'=>'products/tshirt1.jpg',
            'amount'=>200,
            'price'=>30.00,
            'category_id'=>2,
        ));
        products::firstOrcreate(array(
            'name'=>'koszulka',
            'description'=>'Wygodna niebieska koszulka',
            'image'=>'products\tshirt2.jpg',
            'amount'=>500,
            'price'=>40.00,
            'category_id'=>2,
        ));
        products::firstOrcreate(array(
            'name'=>'Modna koszulka',
            'description'=>'Modna, stylowa i wygodna koszulka',
            'image'=>'products\tshirt3.jpg',
            'amount'=>50,
            'price'=>100.00,
            'category_id'=>2,
        ));
        //accessories
        products::firstOrcreate(array(
            'name'=>'Obudowa na telefon',
            'description'=>'Stylowa obudowa na telefon',
            'image'=>'products\phonecase1.jpg',
            'amount'=>200,
            'price'=>55.00,
            'category_id'=>3,
        ));
        //electronic
        products::firstOrcreate(array(
            'name'=>'Laptop',
            'description'=>'Super nowoczesny i wydajny laptop do wszystkiego',
            'image'=>'products\phone1.jpg',
            'amount'=>200,
            'price'=>55.00,
            'category_id'=>4,
        ));
        products::firstOrcreate(array(
            'name'=>'Telefon',
            'description'=>'Stylowa nowoczesny i szybki telefon',
            'image'=>'products\laptop1.jpg',
            'amount'=>200,
            'price'=>55.00,
            'category_id'=>4,
        ));
        //
        //jewelery
        products::firstOrcreate(array(
            'name'=>'Pierścionek zaręczynowy',
            'description'=>'Piękny pierścionek zaręczynowy',
            'image'=>'products\ring1.jpg',
            'amount'=>10,
            'price'=>2000.00,
            'category_id'=>6,
        ));
        products::firstOrcreate(array(
            'name'=>'Pierścionek',
            'description'=>'Piękny pierścionek',
            'image'=>'products\ring2.jpg',
            'amount'=>20,
            'price'=>1200.00,
            'category_id'=>6,
        ));


    }
}
