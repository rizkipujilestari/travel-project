<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
            'name'     => 'Superadmin',
            'email'    => 'superadmin@travel.com',
            'password' => Hash::make('admin1234'),
            'phone'    => '081322286797',
        ]);
        DB::table('users')->insert([
            'name'     => 'Bayu Bambang',
            'email'    => 'bayubambang@gmail.com',
            'password' => Hash::make('bayu1234'),
            'phone'    => '081388889999',
        ]);
        
        DB::table('oauth_clients')->insert([
            'name'       => 'personal-access-token',
            'secret'     => 'tBbOH0iy2xumThajndsvv7gq3Slr7JGkMMWU0jdB',
            'redirect'   => 'http://localhost',
            'revoked'    => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password_client'        => false,
            'personal_access_client' => true, 
        ]);

        DB::table('oauth_personal_access_clients')->insert([
            'client_id'  => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
