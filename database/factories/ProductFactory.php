<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{

    public function definition()
    {
        return [
            'name'=> $this->faker->word,
            'price'=> $this->faker->numberBetween(100,300),
            'public'=>$this->faker->boolean(),
        ];
    }
}
