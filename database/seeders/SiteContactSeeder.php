<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContact;

class SiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContact::create(array(
            'name'           => 'Jaderson Rodrigues',
            'phone'          => '31986245883',
            'email'          => 'jadersonrodrigues01@gmail.com',
            'reason_contact_id' => 1,
            'message'        => 'Help me plz!',
        ));
    }
}
