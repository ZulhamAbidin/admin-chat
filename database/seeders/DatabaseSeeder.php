<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin User',
            'email' => 'zlhm378@gmail.com',
            'password' => Hash::make('123809'),
        ]);

        User::create([
            'name' => 'orangtua siswa',
            'email' => 'orangtua@gmail.com',
            'password' => Hash::make('123809'),
        ]);

        User::create([
            'name' => 'orangtua 2 siswa',
            'email' => 'orangtua2@gmail.com',
            'password' => Hash::make('123809'),
        ]);
    }
}