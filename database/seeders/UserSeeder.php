<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


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
                'useUsername' => 'test',
                'usePassword' => '$2y$10$J42g0/dzGVX.5R8QwOM4De/w7HbIApBwQp9qJSHc8SOos4cRTu6tO',

                'useFirstname' => 'Max',
                'useLastname' => 'Mustermann',

                'useStreet' => 'Musterstrasse 1',
                'useZip' => '4057',
                'useCity' => 'Basel',
                'useState' => 'Switzerland',

                'useMail' => 'test@test.ch',
            ],

        ]);
    }
}
