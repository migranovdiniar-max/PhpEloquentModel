<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    public function definition(): array
    {
        return [
            "name" => $this->faker->company(),
            "contact_email" => $this->faker->unique()->companyEmail(),
        ]
    }
}
