<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SiteContact;

class SiteContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'              => $this->faker->name(),
            'phone'             => $this->faker->e164PhoneNumber(),
            'email'             => $this->faker->safeEmail(),
            'reason_contact_id' => $this->faker->numberBetween(1, 3),
            'message'           => $this->faker->text(300)
        ];
    }
}
