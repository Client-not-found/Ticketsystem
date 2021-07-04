<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('users')->insert([
            [
                'useGroId' => '1',
                'useUsername' => 'admin',
                'usePassword' => Hash::make('admin'),

                'useFirstname' => 'Max',
                'useLastname' => 'Mustermann',

                'useStreet' => 'Musterstrasse 1',
                'useZip' => '4057',
                'useCity' => 'Basel',
                'useState' => 'Switzerland',

                'useMail' => 'admin@test.ch',
            ],

        ]);
    }
}
