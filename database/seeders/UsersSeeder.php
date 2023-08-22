<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name'              => 'mustafa sabah',
            'email'             => 'eng.m.sabah@gmail.com',
            'password'          => Hash::make('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
            'current_team_id'   => 1,
        ]);
    }
}
