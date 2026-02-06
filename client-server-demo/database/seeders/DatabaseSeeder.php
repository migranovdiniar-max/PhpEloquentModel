<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Server::factory()->count(10)->create();
    }
}
