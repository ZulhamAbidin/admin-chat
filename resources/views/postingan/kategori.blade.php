<x-app-layout>
    <div class=" dark:text-primary p-8 rounded-xl mt-2">
        <h1 class="text-2xl font-bold mb-4">Postingan dalam Kategori: {{ $category->name }}</h1>

        @if ($posts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
            <div class="card">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center space-x-3">
                        <div class="avatar size-9">
                            <img class="rounded-full" src="{{ asset('lineone/images/app-logo.svg') }}" alt="avatar">
                        </div>
                        <div>
                            <p class="text-slate-700 dark:text-navy-100 font-medium">Admin SMKN 7 Makassar</p>
                            <p class="text-xs text-slate-400 dark:text-navy-300">
                                {{ $post['formatted_date'] }}
                            </p>
                        </div>
                    </div>
                </div>

                <img class="h-48 w-full object-cover object-center" src="{{ asset('storage/' . $post['cover_photo_path']) }}" alt="image">

                <div class="grow px-4 pt-4">
                    <a href="{{ route('postingan.show', $post['slug']) }}" class="text-lg font-semibold text-slate-700 hover:text-primary dark:text-navy-100 dark:hover:text-accent-light">
                        {{ $post['title'] }}</a>
                    </a>
                    <p class="mt-2 text-sm text-slate-600 dark:text-navy-200 line-clamp-3">
                        {{ Str::limit(strip_tags($post['sub_title']), 200) }}
                    </p>

                    {{-- HASHTAG --}}
                    <div class="inline-space mt-3 flex flex-wrap">
                        @foreach ($post['tags'] as $tag)
                            <a href="{{ url('/tag/' . Str::slug($tag)) }}"
                               class="tag rounded-full bg-primary/10 text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25 px-3 py-1 text-xs font-medium">
                                #{{ $tag }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
        @else
        <p class="text-center text-gray-500 dark:text-gray-300">Tidak ada postingan dalam kategori ini.</p>
        @endif
    </div>
</x-app-layout>
