<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\SiteContact;
use \App\Models\Supplier;
use \App\Models\Product;
use \App\Models\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ReasonContactSeeder::class);
        $this->call(UnitSeeder::class);
        // $this->call(ClientSeeder::class, ['count' => 10]);
        
        SiteContact::factory(10)->create();
        Supplier::factory(10)->create();
        Product::factory(10)->create();
        Client::factory(10)->create();
    }
}
