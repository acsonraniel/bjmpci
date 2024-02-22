<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert superadmin account
        DB::table('tbl_users')->insert([
            'name' => 'superadmin',
            'username' => 'admin',
            'password' => Hash::make('Admin123!'),
            'role' => 'Super Admin',
            'is_user' => True,

        ]);
    }
}
