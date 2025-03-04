<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FblogCategoryFblogPostSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fblog_category_fblog_post')->insert([
            ['id' => 1, 'post_id' => 1, 'category_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'post_id' => 2, 'category_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'post_id' => 3, 'category_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'post_id' => 3, 'category_id' => 4, 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'post_id' => 5, 'category_id' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'post_id' => 5, 'category_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 7, 'post_id' => 5, 'category_id' => 2, 'created_at' => null, 'updated_at' => null],
        ]);
    }
}