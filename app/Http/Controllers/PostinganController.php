<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class PostinganController extends Controller
{
    public function semua()
    {
        // Ambil nama tabel dari konfigurasi dengan default 'blog_posts' jika tidak ditemukan
        $tableName = Config::get('filamentblog.tables.prefix', '') . 'posts';

        // Mengambil postingan yang sudah dipublikasikan, diurutkan dari terbaru
        $postingan = DB::table($tableName)
            ->select('id', 'title', 'slug', 'sub_title', 'body', 'cover_photo_path', 'photo_alt_text', 'published_at')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(function ($post) {
                $post->formatted_date = Carbon::parse($post->published_at)->format('d M Y');
                return $post;
            });

        return view('postingan.semua', compact('postingan'));
    }

    public function show($slug)
    {
        $tableName = Config::get('filamentblog.tables.prefix', '') . 'posts';

        // Ambil postingan berdasarkan slug
        $postingan = DB::table($tableName)
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$postingan) {
            abort(404); // Jika postingan tidak ditemukan, tampilkan 404
        }

        $postingan->formatted_date = Carbon::parse($postingan->published_at)->format('d M Y');

        return view('postingan.show', compact('postingan'));
    }
}
