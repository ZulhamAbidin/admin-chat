<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FilamentBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tablePrefix = config('filamentblog.tables.prefix');

        // Seed Categories
        DB::table("{$tablePrefix}categories")->insert([
            ['name' => 'Technology', 'slug' => Str::slug('Technology'), 'created_at' => Carbon::now()],
            ['name' => 'Education', 'slug' => Str::slug('Education'), 'created_at' => Carbon::now()],
            ['name' => 'Lifestyle', 'slug' => Str::slug('Lifestyle'), 'created_at' => Carbon::now()],
        ]);

        // Seed Tags
        DB::table("{$tablePrefix}tags")->insert([
            ['name' => 'Laravel', 'slug' => Str::slug('Laravel'), 'created_at' => Carbon::now()],
            ['name' => 'Filament', 'slug' => Str::slug('Filament'), 'created_at' => Carbon::now()],
            ['name' => 'PHP', 'slug' => Str::slug('PHP'), 'created_at' => Carbon::now()],
        ]);

        // Seed Posts
        DB::table("{$tablePrefix}posts")->insert([
            [
                'title' => 'Getting Started with Laravel',
                'slug' => Str::slug('Getting Started with Laravel'),
                'sub_title' => 'A beginner’s guide to Laravel framework',
                'body' => 'Laravel is a powerful PHP framework...',
                'status' => 'published',
                'published_at' => Carbon::now(),
                'cover_photo_path' => 'blog-feature-images/Diseminiasi-dan-Moment-Moment-Al-Masoem-27.jpg',
                'photo_alt_text' => 'Laravel Guide',
                config('filamentblog.user.foreign_key') => 1,
                'created_at' => Carbon::now()
            ],
            [
                'title' => 'Filament Admin for Laravel',
                'slug' => Str::slug('Filament Admin for Laravel'),
                'sub_title' => 'Creating admin panels easily with Filament',
                'body' => 'Filament provides a great admin UI for Laravel...',
                'status' => 'published',
                'published_at' => Carbon::now(),
                'cover_photo_path' => 'blog-feature-images/Diseminiasi-dan-Moment-Moment-Al-Masoem-27.jpg',
                'photo_alt_text' => 'Filament Admin',
                config('filamentblog.user.foreign_key') => 1,
                'created_at' => Carbon::now()
            ]
        ]);

        // Seed Settings
        DB::table("{$tablePrefix}settings")->insert([
            [
                'title' => 'My Blog',
                'description' => 'A personal blog powered by Laravel & Filament',
                'logo' => 'logo.png',
                'favicon' => 'favicon.ico',
                'organization_name' => 'My Blog Organization',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}