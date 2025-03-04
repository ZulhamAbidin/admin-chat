<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\FblogCategoryFblogPostSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        User::create([
            'name' => 'Super User',
            'email' => 'zlhm378@gmail.com',
            'telepon' => '6281527501731',
            'password' => Hash::make('123809'),
        ]);

        User::create([
            'name' => 'Admin SMKN 7 Makassar',
            'email' => 'smkn7makassar@gmail.com',
            'telepon' => '6281527501731',
            'password' => Hash::make('123809'),
        ]);

        User::create([
            'name' => 'Slamet Prasetyo',
            'email' => 'slamet.prasetyo@email.com',
            'telepon' => '6281527501731',
            'password' => Hash::make('123809'),
            'role' => 'ortu',
        ]);

        User::create([
            'name' => 'Hasan Basri',
            'email' => 'hasan.basri@email.com',
            'telepon' => '6281527501731',
            'password' => Hash::make('123809'),
            'role' => 'ortu',
        ]);

        User::create([
            'name' => 'joko.santoso',
            'email' => 'joko.santoso@email.com',
            'telepon' => '6281527501731',
            'password' => Hash::make('123809'),
            'role' => 'ortu',
        ]);

        User::create([
            'name' => 'Bambang Wijaya',
            'email' => 'bambang.wijaya@email.com',
            'telepon' => '6281527501731',
            'password' => Hash::make('123809'),
            'role' => 'ortu',
        ]);

        $this->call([
            FblogCategoriesSeeder::class,
            FblogTagsSeeder::class,
            FblogPostsSeeder::class,
            FblogCategoryFblogPostSeeder::class,
            FblogPostFblogTagSeeder::class,
            FblogSeoDetailsSeeder::class,
            JurusanSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            PelanggaranSeeder::class,
            PelanggaranSiswaSeeder::class,
            JumbotronSeeder::class,
            GuruSeeder::class,
        ]);
    }
}