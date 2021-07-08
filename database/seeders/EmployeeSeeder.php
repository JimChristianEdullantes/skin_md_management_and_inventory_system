<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'first_name' => 'Jim Christian',
            'last_name' => 'Edullantes',
            'gender' => 'Male',
            'address' => 'Salawagan, Quezon, Bukidnon',
            'birthdate' => date('Y-m-d H:i:s'),
            'phone_number' => '09513866175',
            'user_type_id' => 1,
        ]);

        DB::table('employees')->insert([
            'first_name' => 'Joan',
            'last_name' => 'Esquierdo',
            'gender' => 'Female',
            'address' => 'Camp Philips, Manolo Fortich, Bukidnon',
            'birthdate' => date('Y-m-d H:i:s'),
            'phone_number' => '09513866175',
            'user_type_id' => 3,
        ]);

        DB::table('employees')->insert([
            'first_name' => 'Claire Justin',
            'last_name' => 'Virador',
            'gender' => 'Female',
            'address' => 'Purok 7, Dangcagan, Bukidnon',
            'birthdate' => date('Y-m-d H:i:s'),
            'phone_number' => '09513866175',
            'user_type_id' => 2,
        ]);
    }
}
