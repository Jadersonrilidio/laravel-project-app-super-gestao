<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Unit::find(1)) {
            Unit::create(['unit' => 'mg', 'description' => 'miligrams']);
            Unit::create(['unit' => 'g', 'description' => 'grams']);
            Unit::create(['unit' => 'kg', 'description' => 'kilograms']);
            Unit::create(['unit' => 'T', 'description' => 'toms']);
        }
    }
}
