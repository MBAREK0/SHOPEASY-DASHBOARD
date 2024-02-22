<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            for ($i = 1; $i <= 5; $i++) {      
            category::create([
                'name' => 'category ' . $i
            ]);
            }

          for ($i = 1; $i <= 40; $i++) {
            Product::create([
                'name' => 'Product ' . $i,
                'description' => 'Description for product ' . $i,
                'prix' => rand(10, 100),
                'quantity' => rand(1, 100),
                'id_categorie' => rand(1, 5),
                'tags' => 'Tag ' . $i,
                'image_path' => '65d61104423f7.jpg',
            ]);
        }
    }
}
