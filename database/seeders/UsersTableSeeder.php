<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'DT Admin',
            'email' => 'dtuser@mailinator.com',
            'password' => Hash::make('dt@password'),
            'phone_number' => '9988998899',
            'gender' => 'Male',
            

        ]);
    }
}
