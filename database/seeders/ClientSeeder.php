<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($count)
    {
        if(is_numeric($count))
            for ($i = 0; $i <= $count; $i++)
                Client::create(['name' => $this->faker->name()]);
    }
}
