<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FblogPostFblogTagSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('fblog_post_fblog_tag')->insert([
            ['id' => 1, 'post_id' => 1, 'tag_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 2, 'post_id' => 1, 'tag_id' => 4, 'created_at' => null, 'updated_at' => null],
            ['id' => 3, 'post_id' => 2, 'tag_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 4, 'post_id' => 2, 'tag_id' => 4, 'created_at' => null, 'updated_at' => null],
            ['id' => 5, 'post_id' => 3, 'tag_id' => 4, 'created_at' => null, 'updated_at' => null],
            ['id' => 6, 'post_id' => 3, 'tag_id' => 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 7, 'post_id' => 3, 'tag_id' => 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 8, 'post_id' => 4, 'tag_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 9, 'post_id' => 4, 'tag_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 10, 'post_id' => 4, 'tag_id' => 4, 'created_at' => null, 'updated_at' => null],
            ['id' => 11, 'post_id' => 5, 'tag_id' => 5, 'created_at' => null, 'updated_at' => null],
            ['id' => 12, 'post_id' => 5, 'tag_id' => 3, 'created_at' => null, 'updated_at' => null],
            ['id' => 13, 'post_id' => 5, 'tag_id' => 2, 'created_at' => null, 'updated_at' => null],
        ]);
    }
}