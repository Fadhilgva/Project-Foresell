<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(2, 8)),
            'category_id' => $this->faker->numberBetween(1, 3),
            'store_id' => $this->faker->numberBetween(1, 3),
            'slug' => $this->faker->slug(),
            'price' => $this->faker->randomNumber(5, true),
            'stock' => $this->faker->numberBetween(1, 100),
            'sold' => $this->faker->numberBetween(1, 50),
            'discount' => $this->faker->numberBetween(0, 30),
            'desc' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))) . '</p>'
        ];
    }
}
