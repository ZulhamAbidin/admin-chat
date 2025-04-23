<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Pagination\LengthAwarePaginator;

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

  

public function indexByCategory($slug)
{
    // Ambil kategori berdasarkan slug
    $category = DB::table(config('filamentblog.tables.prefix') . 'categories')
        ->where('slug', $slug)
        ->first();

    if (!$category) {
        abort(404, 'Kategori tidak ditemukan');
    }

    // Ambil postingan yang berstatus "published" dalam kategori ini
    $posts = DB::table(config('filamentblog.tables.prefix') . 'posts')
        ->join(
            config('filamentblog.tables.prefix') . 'category_' . config('filamentblog.tables.prefix') . 'post',
            config('filamentblog.tables.prefix') . 'posts.id',
            '=',
            config('filamentblog.tables.prefix') . 'category_' . config('filamentblog.tables.prefix') . 'post.post_id'
        )
        ->where(config('filamentblog.tables.prefix') . 'category_' . config('filamentblog.tables.prefix') . 'post.category_id', $category->id)
        ->where(config('filamentblog.tables.prefix') . 'posts.status', 'published')
        ->select(config('filamentblog.tables.prefix') . 'posts.*')
        ->latest()
        ->paginate(10);

    // Konversi pagination ke array agar bisa dimodifikasi
    $modifiedPosts = [];
    foreach ($posts->items() as $post) {
        $modifiedPosts[] = [
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'sub_title' => $post->sub_title,
            'cover_photo_path' => $post->cover_photo_path,
            'formatted_date' => Carbon::parse($post->published_at)->format('d M Y'),
            'tags' => [], // Tags akan ditambahkan di bawah
        ];
    }

    // Ambil ID post untuk mendapatkan tags
    $postIds = array_column($modifiedPosts, 'id');

    // Ambil tags untuk semua post dalam satu query
    $postTags = DB::table(config('filamentblog.tables.prefix') . 'tags')
        ->join(
            config('filamentblog.tables.prefix') . 'post_' . config('filamentblog.tables.prefix') . 'tag',
            config('filamentblog.tables.prefix') . 'tags.id',
            '=',
            config('filamentblog.tables.prefix') . 'post_' . config('filamentblog.tables.prefix') . 'tag.tag_id'
        )
        ->whereIn(config('filamentblog.tables.prefix') . 'post_' . config('filamentblog.tables.prefix') . 'tag.post_id', $postIds)
        ->select(
            config('filamentblog.tables.prefix') . 'post_' . config('filamentblog.tables.prefix') . 'tag.post_id',
            config('filamentblog.tables.prefix') . 'tags.name'
        )
        ->get();

    // Kelompokkan tags berdasarkan post_id
    $tagsByPost = [];
    foreach ($postTags as $tag) {
        $tagsByPost[$tag->post_id][] = $tag->name;
    }

    // Tambahkan tags ke setiap post
    foreach ($modifiedPosts as &$post) {
        $post['tags'] = $tagsByPost[$post['id']] ?? [];
    }

    // Buat ulang paginator dengan data yang telah dimodifikasi
    $posts = new LengthAwarePaginator(
        $modifiedPosts,
        $posts->total(),
        $posts->perPage(),
        $posts->currentPage(),
        ['path' => request()->url(), 'query' => request()->query()]
    );

    return view('postingan.kategori', compact('category', 'posts'));
}

}