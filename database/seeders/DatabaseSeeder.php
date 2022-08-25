<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Supplier;
use \App\Models\SiteContact;
use \App\Models\Product;

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
        
        SiteContact::factory(10)->create();
        Supplier::factory(10)->create();
        Product::factory(20)->create();
    }
}
