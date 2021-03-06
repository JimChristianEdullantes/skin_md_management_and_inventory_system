<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'user_type_name' => "Administrator",
        ]);

        DB::table('user_types')->insert([
            'user_type_name' => "Doctor",
        ]);

        DB::table('user_types')->insert([
            'user_type_name' => "Receptionist",
        ]);
    }
}
