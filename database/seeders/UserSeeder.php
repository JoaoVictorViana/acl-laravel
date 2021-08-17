<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        User::create([
            'name' => 'João Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'api_token' => Str::random(60),
        ])->roles()->attach(1);

        User::create([
            'name' => 'João User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'api_token' => Str::random(60),
        ])->roles()->attach(2);
    }
}
