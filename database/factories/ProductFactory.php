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
            'name'        => $this->faker->word(),
            'description' => $this->faker->text(300),
            'weight'      => $this->faker->numberBetween(0, 120),
            'unit_id'     => $this->faker->numberBetween(1, 4),
        ];
    }
}
