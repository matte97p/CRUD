<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Create 33 fake data for Product::class
     *
     * @return void
     */
    public function run(): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 33; $i++) {
            Product::create([
                'name' => $faker->text(15),
                'description' => $faker->paragraph,
                'price' => $faker->numberBetween(10,500),
                'sell_percentage' => $faker->numberBetween(1, 15),
                'sku' => $faker->unique()->regexify('[A-Z]{5}[0-4]{3}'),
                'image' => $faker->imageUrl($width = 100, $height = 100),
                'availability' => $faker->numberBetween(0, 50)
            ]);
        }
    }
}
