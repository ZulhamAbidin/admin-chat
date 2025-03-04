<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('guru')->insert([
            [
                'id' => 1,
                'nama' => 'Budi Santoso',
                'jabatan' => 'Kepala Sekolah',
                'foto' => 'guru/budi_santoso.jpg',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'no_ponsel' => '081234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'nama' => 'Siti Rahmawati',
                'jabatan' => 'Wakil Kepala Sekolah',
                'foto' => 'guru/siti_rahmawati.jpg',
                'alamat' => 'Jl. Diponegoro No. 5, Bandung',
                'no_ponsel' => '082345678901',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'nama' => 'Ahmad Fauzi',
                'jabatan' => 'Guru Matematika',
                'foto' => 'guru/ahmad_fauzi.jpg',
                'alamat' => 'Jl. Sudirman No. 7, Surabaya',
                'no_ponsel' => '083456789012',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'nama' => 'Dewi Lestari',
                'jabatan' => 'Guru Bahasa Inggris',
                'foto' => 'guru/dewi_lestari.jpg',
                'alamat' => 'Jl. Ahmad Yani No. 3, Yogyakarta',
                'no_ponsel' => '084567890123',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'nama' => 'Hendra Saputra',
                'jabatan' => 'Guru Fisika',
                'foto' => 'guru/hendra_saputra.jpg',
                'alamat' => 'Jl. Gatot Subroto No. 9, Medan',
                'no_ponsel' => '085678901234',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}