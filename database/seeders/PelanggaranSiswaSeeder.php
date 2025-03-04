<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PelanggaranSiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggaran_siswa')->insert([
            ['siswa_id' => 1, 'pelanggaran_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['siswa_id' => 1, 'pelanggaran_id' => 3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['siswa_id' => 2, 'pelanggaran_id' => 2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['siswa_id' => 2, 'pelanggaran_id' => 4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['siswa_id' => 3, 'pelanggaran_id' => 5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['siswa_id' => 3, 'pelanggaran_id' => 6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['siswa_id' => 4, 'pelanggaran_id' => 7, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['siswa_id' => 4, 'pelanggaran_id' => 1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}