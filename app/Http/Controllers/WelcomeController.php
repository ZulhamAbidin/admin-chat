<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function index()
    {
        $tableName = Config::get('filamentblog.tables.prefix') . 'posts';
        $latestPosts = DB::table($tableName)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->limit(4)
            ->get()
            ->map(function ($post) {
                $post->formatted_date = Carbon::parse($post->published_at)->format('d M Y');
                return $post;
            });

        return view('welcome', compact('latestPosts'));
    }
}