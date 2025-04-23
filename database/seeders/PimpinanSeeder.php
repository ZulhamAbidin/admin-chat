<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PimpinanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pimpinan')->insert([
            [
                'id' => 1,
                'nama' => 'Drs. H. Suparman, M.Pd.',
                'jabatan' => 'Kepala Sekolah',
                'foto' => 'pimpinan/01JNH1AAZPZ1AB1WJ8BVTG0290.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama' => 'Hj. Siti Rahmawati, S.Pd., M.M.',
                'jabatan' => 'Wakil Kepala Sekolah Bidang Kurikulum',
                'foto' => 'pimpinan/01JNH1AAZPZ1AB1WJ8BVTG0290.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'nama' => 'Ir. Andi Yusuf, M.T.',
                'jabatan' => 'Wakil Kepala Sekolah Bidang Sarana dan Prasarana',
                'foto' => 'pimpinan/01JNH1AAZPZ1AB1WJ8BVTG0290.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'nama' => 'Muhammad Iqbal, S.Pd., M.Pd.',
                'jabatan' => 'Wakil Kepala Sekolah Bidang Kesiswaan',
                'foto' => 'pimpinan/01JNH1AAZPZ1AB1WJ8BVTG0290.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'nama' => 'Nurhayati, S.E., M.Ak.',
                'jabatan' => 'Wakil Kepala Sekolah Bidang Hubungan Industri',
                'foto' => 'pimpinan/01JNH1AAZPZ1AB1WJ8BVTG0290.jpeg',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}