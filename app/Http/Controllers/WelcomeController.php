<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Pimpinan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class WelcomeController extends Controller
{
    public function index()
    {
        $pimpinan = Pimpinan::all();
        $tableName = Config::get('filamentblog.tables.prefix') . 'posts';
        $totalSiswa = Siswa::count();
        $totalGuru = Guru::count();
        $totalJurusan = Jurusan::count();
        
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

        return view('welcome', compact('latestPosts', 'pimpinan', 'totalSiswa', 'totalGuru', 'totalJurusan'));
    }

    public function jurusan()
    {
        $jurusan = Jurusan::all();
        return view('lainya.jurusan', compact('jurusan'));
    }

    public function guru()
    {
        $guru = Guru::all();
        return view('lainya.guru', compact('guru'));
    }
}