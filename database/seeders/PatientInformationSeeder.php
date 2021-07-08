<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patient_information')->insert([
            'patient_firstname' => 'Juan',
            'patient_lastname' => 'Dela Cruz',
            'patient_sex' => 'Male',
            'patient_birthdate' => date('Y-m-d H:i:s'),
            'patient_address' => 'Purok 7, Dangcagan, Bukidnon',
            'patient_phone_number' => '09262953812',
        ]);

        DB::table('patient_information')->insert([
            'patient_firstname' => 'Cardo',
            'patient_lastname' => 'Dalisay',
            'patient_sex' => 'Male',
            'patient_birthdate' => date('Y-m-d H:i:s'),
            'patient_address' => 'Salawagan, Quezon, Bukidnon',
            'patient_phone_number' => '09262953812',
        ]);

        DB::table('patient_information')->insert([
            'patient_firstname' => 'Lunar',
            'patient_lastname' => 'Munday',
            'patient_sex' => 'Female',
            'patient_birthdate' => date('Y-m-d H:i:s'),
            'patient_address' => 'Poblacion, Lantapan, Bukidnon',
            'patient_phone_number' => '09262953812',
        ]);

        DB::table('patient_information')->insert([
            'patient_firstname' => 'Jessa',
            'patient_lastname' => 'Recosa',
            'patient_sex' => 'Female',
            'patient_birthdate' => date('Y-m-d H:i:s'),
            'patient_address' => 'Camp Philips, Manolo Fortich, Bukidnon',
            'patient_phone_number' => '09262953812',
        ]);

        DB::table('patient_information')->insert([
            'patient_firstname' => 'Revecca',
            'patient_lastname' => 'Dressrosa',
            'patient_sex' => 'Female',
            'patient_birthdate' => date('Y-m-d H:i:s'),
            'patient_address' => 'Camp 1, Maramag, Bukidnon',
            'patient_phone_number' => '09262953812',
        ]);

        
    }
}
