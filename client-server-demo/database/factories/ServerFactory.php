<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    public function definition(): array
    {
        return [
            "client_id" => Client::factory(),
            "hostname" => fake()->unique()->bothify('srv-??-###'),
            "ip_address" => fake()->ipv4(),
            "os" => fake()->randomElement(['Ubuntu 22.04', 'Debian 12', 'CentOS 7', 'Rocky 9', null]),
            "status" => fake()->randomElement(['active', 'maintenance', 'offline']),
        ];
    }
}
