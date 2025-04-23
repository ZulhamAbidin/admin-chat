<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $jumlahSiswa = 500;

        $data = [];

        for ($i = 1; $i <= $jumlahSiswa; $i++) {
            $data[] = [
                'user_id' => rand(1, 3),
                'nis' => '1929042120' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'nama' => fake()->name(),
                'alamat' => fake()->address(),
                'tanggal_lahir' => \Carbon\Carbon::now()->subYears(rand(10, 20))->format('Y-m-d'),
                'jurusan_id' => rand(1, 4),
                'kelas_id' => rand(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('siswa')->insert($data);

        DB::table('siswa')->insert([
            [
                'user_id' => 3,
                'jurusan_id' => 1,
                'kelas_id' => 1,
                'nis' => '1929042011',
                'nama' => 'Budi Prasetyo',
                'alamat' => 'Makassar',
                'tanggal_lahir' => '2000-12-12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 4,
                'jurusan_id' => 2,
                'kelas_id' => 3,
                'nis' => '1929042022',
                'nama' => 'Siti Aisyah',
                'alamat' => 'Makassar',
                'tanggal_lahir' => '2019-12-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 5,
                'jurusan_id' => 3,
                'kelas_id' => 4,
                'nis' => '1929042033',
                'nama' => 'Andi Saputra',
                'alamat' => 'Makassar',
                'tanggal_lahir' => '2008-10-31',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
            [
                'user_id' => 6,
                'jurusan_id' => 4,
                'kelas_id' => 4,
                'nis' => '1929042044',
                'nama' => 'Rizky Maulana',
                'alamat' => 'Makassar',
                'tanggal_lahir' => '2005-03-21',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null,
            ],
        ]);
    }
}
