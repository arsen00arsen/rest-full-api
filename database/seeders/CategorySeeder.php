<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            [
                'title' => 'asd1',
            ],
            [
                'title' => 'asd2',
            ],
            [
                'title' => 'asd3',
            ],
            [
                'title' => 'asd4',
            ],
            [
                'title' => 'asd5',
            ],
            [
                'title' => 'asd6',
            ],
            [
                'title' => 'asd7',
            ],
            [
                'title' => 'asd8',
            ],
        ]);

    }
}
