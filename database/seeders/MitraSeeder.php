<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mitra;
use Faker\Factory as Faker;

class MitraSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            Mitra::create([
                'nama' => $faker->company,
                'email' => $faker->unique()->safeEmail,
                'telepon' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'foto' => 'mitra/01JNK78EP5CTYH8588K5G64H5V.jpeg',
                'deskripsi' => $faker->sentence(10),
            ]);
        }
    }
}