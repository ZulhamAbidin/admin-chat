<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FblogSeoDetailsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fblog_seo_details')->insert([
            [
                'id' => 1,
                'post_id' => 1,
                'title' => 'Pendidikan Vokasi di Era Digital',
                'keywords' => json_encode(["pendidikan", "vokasi", "smk"]),
                'description' => 'Pendidikan vokasi membantu siswa siap kerja.',
                'created_at' => Carbon::parse('2025-03-04 04:37:56'),
                'updated_at' => Carbon::parse('2025-03-04 04:37:56'),
            ],
            [
                'id' => 2,
                'post_id' => 2,
                'title' => 'Lomba Kreativitas Siswa SMK',
                'keywords' => json_encode(["lomba", "kreativitas", "SMK"]),
                'description' => 'Ajang kreativitas siswa untuk berinovasi.',
                'created_at' => Carbon::parse('2025-03-04 04:38:25'),
                'updated_at' => Carbon::parse('2025-03-04 04:38:25'),
            ],
            [
                'id' => 3,
                'post_id' => 3,
                'title' => 'Tips Menghadapi Ujian Kompetensi',
                'keywords' => json_encode(["UKK", "Ujian", "SMK", "persiapan"]),
                'description' => 'Cara sukses menghadapi UKK dengan optimal.',
                'created_at' => Carbon::parse('2025-03-04 04:38:56'),
                'updated_at' => Carbon::parse('2025-03-04 04:38:56'),
            ],
            [
                'id' => 4,
                'post_id' => 4,
                'title' => 'Teknologi AI dalam Dunia Pendidikan',
                'keywords' => json_encode(["teknologi", "pendidikan", "AI"]),
                'description' => 'AI mengubah cara belajar dan mengajar.',
                'created_at' => Carbon::parse('2025-03-04 04:39:23'),
                'updated_at' => Carbon::parse('2025-03-04 04:39:23'),
            ],
            [
                'id' => 5,
                'post_id' => 5,
                'title' => 'Startup Inovatif dari Siswa SMK',
                'keywords' => json_encode(["startup", "Siswa SMK", "Bisnis"]),
                'description' => 'Siswa SMK berinovasi dalam dunia startup.',
                'created_at' => Carbon::parse('2025-03-04 04:40:05'),
                'updated_at' => Carbon::parse('2025-03-04 04:40:05'),
            ],
        ]);
    }
}
