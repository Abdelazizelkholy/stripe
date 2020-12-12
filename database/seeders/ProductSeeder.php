<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    public function run()
    {
        //  $count = 5;
        //   factory(\App\Models\Product::class, $count)->create();
        Product::factory(5)->create();

    }
}
