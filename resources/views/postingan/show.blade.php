<x-app-layout>
    <div class="grid grid-cols-12 lg:gap-6">
        <div class="col-span-12 pt-6 lg:col-span-8 lg:pb-6">
            <div class="card p-4 lg:p-6">
                <div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="flex">
                                <div class="avatar h-12 w-12">
                                    <img class="mask is-squircle" src="{{asset('lineone/images/app-logo.svg')}}" alt="avatar" />
                                </div>
                                <div>
                                    <a href="#" class="font-medium text-slate-700 line-clamp-1 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                        Admin SMKN Negeri 7 Makassar
                                    </a>

                                    <div class="mt-1.5 flex items-center text-xs">
                                        <span class="line-clamp-1">{{ $postingan->formatted_date }}</span>
                                        <div class="mx-2 my-0.5 w-px self-stretch bg-white/20"></div>
                                        <p class="shrink-0">8 min read</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 font-inter text-base text-slate-600 dark:text-navy-200">
                    <h1 class="text-xl font-medium text-slate-900 dark:text-navy-50 lg:text-2xl">
                        {{ $postingan->title }}
                    </h1>
                    <h3 class="mt-1">
                        {{ $postingan->sub_title }}
                    </h3>
                    <img class="rounded-lg mt-5" src="{{ asset('storage/' . $postingan->cover_photo_path) }}" alt="{{ $postingan->photo_alt_text }}" width="100%">
                    <br />
                    <article class="m-auto leading-6">
                        {!! tiptap_converter()->asHTML($postingan->body, toc: true, maxDepth: 3) !!}
                    </article>
                </div>
            </div>
            <div class="mt-5">
                <div class="flex items-center justify-between">
                    <p class="text-lg font-medium text-slate-800 dark:text-navy-100">
                        Recent Articles
                    </p>
                    <a href="#" class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">
                        Lihat Semua Postingan
                    </a>
                </div>
                <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">
                    @foreach($recentPosts as $post)
                    <div class="card lg:flex-row">
                        <img class="h-48 w-full shrink-0 rounded-t-lg bg-cover bg-center object-cover object-center lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l-lg" src="{{ asset('storage/' . $post->cover_photo_path) }}" alt="{{ $post->photo_alt_text }}" />
                        <div class="flex w-full grow flex-col px-4 py-3 sm:px-5">
                            <div>
                                <a href="{{ route('postingan.show', $post->slug) }}" class="text-lg font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                    {{ $post->title }}
                                </a>
                            </div>
                            <p class="mt-1 line-clamp-3">{{ $post->sub_title }}</p>
                            <div class="grow">
                                <div class="mt-2 flex items-center text-xs">
                                    <span class="shrink-0 text-slate-400 dark:text-navy-300">{{ $post->formatted_date }}</span>
                                </div>
                            </div>
                            <div class="mt-1 flex justify-end">
                                <a href="{{ route('postingan.show', $post->slug) }}" class="btn px-2.5 py-1.5 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                                    Baca Artikel
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-span-12 py-6 lg:col-span-4">

            <div class="flex items-center justify-between">
                <h2 class="p-4 text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
                    List Komentar
                </h2>
            </div>

            @if ($komentar->isEmpty())
            <p class="text-center text-gray-500 dark:text-gray-400 mt-4">Belum ada komentar.</p>
            @else
            @foreach ($komentar as $k)
            <div class="card p-4 mx-2 my-2">
                <div class="flex items-center space-x-3">
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <p class="font-medium text-slate-700 dark:text-navy-100">
                                {{ $k->commenter_name ?? 'Anonim' }}
                            </p>
                        </div>
                        <div class="mt-0.5 text-slate-700 dark:text-navy-100 text-xs">
                            <p class="py-2">{{ $k->comment }}</p>
                        </div>
                        <div class="mt-0.5 flex text-xs text-slate-400 dark:text-navy-300">
                            <button class="h-7 px-2 w-fit btn bg-primary/10 text-primary hover:bg-primary/20">
                                {{ $k->formatted_date }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif

            <div class="flex items-center justify-between">
                <h2 class="p-4 text-sm+ font-medium tracking-wide text-slate-700 dark:text-navy-100">
                    Tambahkan Komentar
                </h2>
            </div>

            @auth
            <div class="card p-4 pt-2 mx-2">
                <p class="text-center text-gray-500 dark:text-gray-400 mt-4">Komentar Anda Akan Tampil Ketika Disetujui Admin.</p>
                <form method="POST" action="{{ route('komentar.store') }}" class="mt-6 space-y-3.5 px-2 pb-4">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $postingan->id }}">

                    <label class="block">
                        <span>Nama Lengkap:</span>
                        <input name="name" required class="form-input mt-1.5 w-full rounded-lg border px-3 py-2" placeholder="Nama Anda" type="text" value="{{ auth()->check() ? auth()->user()->name : '' }}" {{ auth()->check() ? 'readonly' : '' }} />
                    </label>

                    <label class="block">
                        <textarea name="comment" rows="4" required placeholder="Masukkan komentar..." class="form-textarea w-full resize-none rounded-lg border p-2.5"></textarea>
                    </label>

                    <div class="flex justify-end">
                        <button type="submit" class="h-10 px-4 w-fit btn bg-primary/10 text-primary hover:bg-primary/20">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
            @else
            <p class="text-center text-slate-600 dark:text-navy-200">Silakan <a href="/admin/login" class="text-primary underline">login</a> untuk menambahkan komentar.</p>
            @endauth

        </div>
    </div>
</x-app-layout>