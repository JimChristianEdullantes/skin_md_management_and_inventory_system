<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'email' => 's.edullantes.jimchristian@cmu.edu.ph',
            'password' => Hash::make('12345678'),
            'employee_id' => 1,
        ]);

        DB::table('users')->insert([
            'email' => 'joanesquierdo@gmail.com',
            'password' => Hash::make('12345678'),
            'employee_id' => 2,
        ]);

        DB::table('users')->insert([
            'email' => 's.virador.clairejustin@cmu.edu.ph',
            'password' => Hash::make('12345678'),
            'employee_id' => 3,
        ]);
    }
}
