<?php

namespace Database\Seeders;

use App\Models\Guestbook;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(1)->create();

        Guestbook::create([
            'firstname' => 'Ridho',
            'lastname' => 'Hafiz',
            'organization' => 'Slank',
            'address' => 'JL Potlot',
            'provincecode' => '11',
            'citycode' => '1101'
        ]);

        Guestbook::create([
            'firstname' => 'Giring',
            'lastname' => 'Ganesha',
            'organization' => 'Nidji',
            'address' => 'Lempuyangan',
            'provincecode' => '13',
            'citycode' => '1311'
        ]);

        Guestbook::create([
            'firstname' => 'Betrand',
            'lastname' => 'Antolin',
            'organization' => 'KMK',
            'address' => 'Bandung',
            'provincecode' => '19',
            'citycode' => '1901'
        ]);
    }
}
