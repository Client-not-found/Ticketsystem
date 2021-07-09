<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departements')->insert([
            [
                'name' => 'Technical Support',
            ],
            [
                'name' => 'General Support',
            ],
            [
                'name' => 'Feedback',
            ],
        ]);
    }
}
