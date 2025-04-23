<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JumbotronSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jumbotrons')->insert([
            [
                'title' => 'Selamat Datang di Website Sekolah',
                'description' => 'Kami menyediakan pendidikan berkualitas dengan fasilitas terbaik.',
                'image' => 'jumbotron/01JN6N7ZDG2K1D9QPMRENF4Z0T.webp',
                'button_text' => 'Pelajari Lebih Lanjut',
                'button_link' => '/about',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Program Unggulan Kami',
                'description' => 'Berbagai program keahlian terbaik untuk masa depan siswa.',
                'image' => 'jumbotron/01JN6N7ZDG2K1D9QPMRENF4Z0T.webp',
                'button_text' => 'Lihat Program',
                'button_link' => '/programs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Daftar Sekarang',
                'description' => 'Jadilah bagian dari sekolah kami dengan mendaftar sekarang juga.',
                'image' => 'jumbotron/01JN6N7ZDG2K1D9QPMRENF4Z0T.webp',
                'button_text' => 'Daftar Sekarang',
                'button_link' => '/register',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
