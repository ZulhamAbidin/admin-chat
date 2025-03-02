<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostinganController extends Controller
{
    public function semua()
    {
        $tableName = Config::get('filamentblog.tables.prefix', '') . 'posts';
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
        $tablePrefix = Config::get('filamentblog.tables.prefix', '');
        $postsTable = $tablePrefix . 'posts';
        $commentsTable = $tablePrefix . 'comments';
        $usersTable = 'users';

        $postingan = DB::table($postsTable)
            ->leftJoin($usersTable, "$postsTable.user_id", '=', "$usersTable.id")
            ->select(
                "$postsTable.*",
                "$usersTable.name as author_name",
                "$usersTable.profile_photo_path as author_avatar"
            )
            ->where("$postsTable.slug", $slug)
            ->where("$postsTable.status", 'published')
            ->first();

        if (!$postingan) {
            abort(404);
        }

        $postingan->formatted_date = Carbon::parse($postingan->published_at)->format('d M Y');

        $komentar = DB::table($commentsTable)
            ->leftJoin($usersTable, "$commentsTable.user_id", '=', "$usersTable.id")
            ->select(
                "$commentsTable.comment",
                "$commentsTable.approved_at",
                "$usersTable.name as commenter_name",
                "$usersTable.profile_photo_path as commenter_avatar"
            )
            ->where("$commentsTable.post_id", $postingan->id)
            ->where("$commentsTable.approved", true)
            ->orderBy("$commentsTable.approved_at", 'desc')
            ->limit(10)
            ->get()
            ->map(function ($komentar) {
                $komentar->formatted_date = Carbon::parse($komentar->approved_at)->format('d M Y');
                return $komentar;
            });


        $recentPosts = DB::table($postsTable)
            ->select('id', 'title', 'slug', 'sub_title', 'cover_photo_path', 'photo_alt_text', 'published_at')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('slug', '!=', $slug)
            ->orderBy('published_at', 'desc')
            ->limit(4)
            ->get()
            ->map(function ($post) {
                $post->formatted_date = Carbon::parse($post->published_at)->format('d M Y');
                return $post;
            });

        return view('postingan.show', compact('postingan', 'komentar', 'recentPosts'));

        return view('postingan.show', compact('postingan', 'komentar'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
            'post_id' => 'required|exists:' . Config::get('filamentblog.tables.prefix') . 'posts,id',
        ]);

        $tableName = Config::get('filamentblog.tables.prefix') . 'comments';

        DB::table($tableName)->insert([
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
            'comment' => $request->comment,
            'approved' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Komentar Anda telah dikirim dan menunggu persetujuan.');
    }
}