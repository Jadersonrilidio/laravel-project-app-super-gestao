<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReasonContact;

class ReasonContactSeeder extends Seeder
{
    /**
     * Enumerate the reasons for site contact forms.
     * 
     * @var array
     */
    protected $reasons = array(
        'Doubt',
        'Compliment',
        'Complaint'
    );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!ReasonContact::find(1))
            foreach ($this->reasons as $reason)
                ReasonContact::create(['reason' => $reason]);
    }
}
