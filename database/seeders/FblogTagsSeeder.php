<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FblogTagsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fblog_tags')->insert([
            [
                'id' => 1,
                'name' => 'Laravel',
                'slug' => 'laravel',
                'created_at' => Carbon::parse('2025-03-04 04:09:04'),
                'updated_at' => null,
            ],
            [
                'id' => 2,
                'name' => 'Filament',
                'slug' => 'filament',
                'created_at' => Carbon::parse('2025-03-04 04:09:04'),
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'name' => 'PHP',
                'slug' => 'php',
                'created_at' => Carbon::parse('2025-03-04 04:09:04'),
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'name' => 'Tips & Trik',
                'slug' => 'tips-trik',
                'created_at' => Carbon::parse('2025-03-04 04:11:54'),
                'updated_at' => Carbon::parse('2025-03-04 04:11:54'),
            ],
            [
                'id' => 5,
                'name' => 'Pendidikan',
                'slug' => 'pendidikan',
                'created_at' => Carbon::parse('2025-03-04 04:12:04'),
                'updated_at' => Carbon::parse('2025-03-04 04:12:04'),
            ],
            [
                'id' => 6,
                'name' => 'Kegiatan',
                'slug' => 'kegiatan',
                'created_at' => Carbon::parse('2025-03-04 04:12:19'),
                'updated_at' => Carbon::parse('2025-03-04 04:12:19'),
            ],
            [
                'id' => 7,
                'name' => 'Inovasi',
                'slug' => 'inovasi',
                'created_at' => Carbon::parse('2025-03-04 04:12:32'),
                'updated_at' => Carbon::parse('2025-03-04 04:12:32'),
            ],
            [
                'id' => 8,
                'name' => 'Teknologi',
                'slug' => 'teknologi',
                'created_at' => Carbon::parse('2025-03-04 04:12:45'),
                'updated_at' => Carbon::parse('2025-03-04 04:12:45'),
            ],
        ]);
    }
}