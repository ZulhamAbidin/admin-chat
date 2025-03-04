<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FblogCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fblog_categories')->insert([
            ['id' => 1, 'name' => 'Technology', 'slug' => 'technology', 'created_at' => Carbon::now(), 'updated_at' => null],
            ['id' => 2, 'name' => 'Education', 'slug' => 'education', 'created_at' => Carbon::now(), 'updated_at' => null],
            ['id' => 3, 'name' => 'Lifestyle', 'slug' => 'lifestyle', 'created_at' => Carbon::now(), 'updated_at' => null],
            ['id' => 4, 'name' => 'Pendidikan', 'slug' => 'pendidikan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 5, 'name' => 'Kegiatan Sekolah', 'slug' => 'kegiatan-sekolah', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 6, 'name' => 'Tips & Trik', 'slug' => 'tips-trik', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}