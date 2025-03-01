<x-app-layout>
    <div class="bg-white dark:bg-navy-600 dark:text-primary p-8 rounded-xl mt-2">
        <section id="postingan">
            <h1 class="text-2xl font-bold text-center mb-10">Postingan Terbaru</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($postingan as $post)
                <div class="flex flex-col">
                    <img class="h-44 w-full rounded-2xl object-cover object-center" src="{{ asset('storage/' . $post->cover_photo_path) }}" alt="{{ $post->photo_alt_text }}">
                    <div class="card -mt-8 grow rounded-2xl p-4">
                        <div>
                            <a href="{{ route('postingan.show', $post->slug) }}" class="text-sm+ font-medium text-yellow-600 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">What
                                {{ $post->title }}</a>
                        </div>
                        <p class="mt-2 grow line-clamp-3">
                            {{ Str::limit(strip_tags($post->sub_title), 200) }}
                        </p>
                        <div class="mt-4 flex items-center justify-between">
                            <a href="detail.html" class="flex items-center space-x-2 text-xs hover:text-slate-800 dark:hover:text-navy-100">
                                <div class="avatar h-6 w-6">
                                    <img class="rounded-full" src="/lineone/images/avatar/avatar-10.jpg" alt="avatar">
                                </div>
                                <span class="line-clamp-1">Admin SMKN 7 Makassar</span>
                            </a>
                            <p class="flex shrink-0 items-center space-x-1.5 text-slate-400 dark:text-navy-300">
                                <svg xmlns="../www.w3.org/2000/svg.html" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-xs">{{ $post->formatted_date }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        {{-- <div class="flex justify-center mt-6">
            <a href="{{ route('postingan.semua') }}" class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                Lihat Semua Postingan
            </a>
        </div> --}}
    </div>

</x-app-layout>
