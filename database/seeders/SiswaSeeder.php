<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SiswaSeeder extends Seeder
{
    public function run()
    {
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