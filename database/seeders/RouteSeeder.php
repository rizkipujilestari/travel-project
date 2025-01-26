<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')->insert([
            "route_name" => "Baltos Bandung",
            "route_code" => "BLT",
            "route_address" => "Jl. Tamansari, Tamansari, Kec. Bandung Wetan",
            "route_city" => "Bandung",
            "route_description" => "Rute Pool Baltos Bandung",
        ]);
        DB::table('routes')->insert([
            "route_name" => "Asia Mall Sumedang",
            "route_code" => "SMD",
            "route_address" => "Jl. Mayor Abdurahman No.225, Kotakaler, Kec. Sumedang Utara",
            "route_city" => "Sumedang",
            "route_description" => "Rute Pool Asia Mall Sumedang",
        ]);
    }
}
