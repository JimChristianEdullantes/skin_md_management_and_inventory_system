<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = new Carbon();
        DB::table('appointments')->insert([
            'patient_id' => 1,
            'date' => $time,
        ]);

        DB::table('appointments')->insert([
            'patient_id' => 2,
            'date' => date('Y-m-d H:i:s'),
        ]);

        DB::table('appointments')->insert([
            'patient_id' => 3,
            'date' => date('Y-m-d H:i:s'),
        ]);

        DB::table('appointments')->insert([
            'patient_id' => 4,
            'date' => date('Y-m-d H:i:s'),
        ]);

        DB::table('appointments')->insert([
            'patient_id' => 5,
            'date' => date('Y-m-d H:i:s'),
        ]);
    }
}
