<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([    
            "origin"         => "1",
            "destination"    => "2",
            "departure_date" => "2025-01-27 00:00:00",
            "departure_time" => "07:00",
            "arrival_date"   => "2025-01-27 00:00:00",
            "arrival_time"   => "09:00",
            "price"          => 55000,
            "quota"          => 10,
            "duration"       => 2,
            "description"    => "Keberangkatan Baltos Bandung ke Asia Mall Sumedang",
        ]);
    }
}
