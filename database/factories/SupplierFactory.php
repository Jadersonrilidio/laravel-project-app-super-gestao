<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Range of the possible brazilian states to feed the database.
     * 
     * @var array
     */
    protected $br_states = ['MG', 'RJ', 'BA', 'RO', 'RS', 'SC', 'SP', 'PR', 'MT', 'MS', 'RN', 'AM', 'TO', 'DF', 'GO', 'SE', 'CE', 'AC', 'AL', 'AP', 'ES', 'MA', 'PB', 'PE', 'PI', 'RR', 'PA'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name(),
            'uf'    => $this->br_states[rand(0, 26)],
            'email' => $this->faker->safeEmail()
        ];
    }
}
