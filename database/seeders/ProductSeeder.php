<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name' => 'aaa',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aawqea',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aaqwea',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aaaqwe',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aqweaa',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aaqqa',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aaaasd',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aazxa',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aarra',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'aayya',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'xfdsdf',
                'price' => 1000,
                'public' => 1,
                'category_id' => rand(1,8)
            ],
            [
                'name' => 'df',
                'price' => 1000,
                'public' => 1,
                'category_id' => "[1, 2]"
            ],
        ]);
    }
}
