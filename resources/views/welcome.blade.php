<x-app-layout>

    {{-- Slider Jumbotron --}}
    <div class="bg-white dark:bg-navy-600 dark:text-primary p-6 rounded-xl">
        @include('komponen.slider')
    </div>

    {{-- Postingan Terbaru --}}
    <div class="bg-white dark:bg-navy-600 dark:text-primary p-8 rounded-xl mt-10">
        <section id="postingan mx-4">
            <h1 class="text-2xl font-bold text-center mb-10">Postingan Terbaru</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($latestPosts as $post)
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

        <div class="flex justify-center mt-6">
            <a href="{{ route('postingan.semua') }}" class="btn bg-primary/10 font-medium text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-accent-light/10 dark:text-accent-light dark:hover:bg-accent-light/20 dark:focus:bg-accent-light/20 dark:active:bg-accent-light/25">
                Lihat Semua Postingan
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-navy-600 dark:text-primary py-8 rounded-xl mt-10">
        <section id="hitung">
            <div class="container mx-auto text-center py-5">
                <h2 class="text-2xl font-bold mb-6">Statistik Sekolah</h2>

                <div class="grid w-full max-w-6xl grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 sm:gap-5 lg:gap-20 mx-auto mt-10 justify-center">

                    <!-- Total Siswa -->
                    <div class="card p-4 text-center sm:p-5 shadow-lg rounded-lg bg-white w-full">
                        <div class="mt-8">
                            <i class="fa fa-users text-6xl text-primary dark:text-accent-light"></i>
                        </div>
                        <div class="mt-5">
                            <h4 class="text-xl font-semibold text-slate-600 dark:text-navy-100">Total Siswa</h4>
                        </div>
                        <div class="mt-5">
                            <span class="text-4xl tracking-tight text-primary dark:text-accent-light counter" data-target="{{ $totalSiswa }}">0</span>
                        </div>
                        <div class="mt-8">
                            <a href="{{ route('siswa.index') }}" class="btn rounded-full border border-slate-200 font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                Lihat Detail
                            </a>
                        </div>
                    </div>

                    <!-- Total Guru -->
                    <div class="card p-4 text-center sm:p-5 shadow-lg rounded-lg bg-white w-full">
                        <div class="mt-8">
                            <i class="fa fa-chalkboard-teacher text-6xl text-primary dark:text-accent-light"></i>
                        </div>
                        <div class="mt-5">
                            <h4 class="text-xl font-semibold text-slate-600 dark:text-navy-100">Total Guru</h4>
                        </div>
                        <div class="mt-5">
                            <span class="text-4xl tracking-tight text-primary dark:text-accent-light counter" data-target="{{ $totalGuru }}">0</span>
                        </div>
                        <div class="mt-8">
                            <a href="{{ route('guru.index') }}" class="btn rounded-full border border-slate-200 font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                Lihat Detail
                            </a>
                        </div>
                    </div>

                    <!-- Total Jurusan -->
                    <div class="card p-4 text-center sm:p-5 shadow-lg rounded-lg bg-white w-full">
                        <div class="mt-8">
                            <i class="fa fa-book text-6xl text-primary dark:text-accent-light"></i>
                        </div>
                        <div class="mt-5">
                            <h4 class="text-xl font-semibold text-slate-600 dark:text-navy-100">Total Jurusan</h4>
                        </div>
                        <div class="mt-5">
                            <span class="text-4xl tracking-tight text-primary dark:text-accent-light counter" data-target="{{ $totalJurusan }}">0</span>
                        </div>
                        <div class="mt-8">
                            <a href="{{ route('jurusan.index') }}" class="btn rounded-full border border-slate-200 font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                Lihat Detail
                            </a>
                        </div>
                    </div>

                    <!-- Total Mitra -->
                    <div class="card p-4 text-center sm:p-5 shadow-lg rounded-lg bg-white w-full">
                        <div class="mt-8">
                            <i class="fa fa-handshake text-6xl text-primary dark:text-accent-light"></i>
                        </div>
                        <div class="mt-5">
                            <h4 class="text-xl font-semibold text-slate-600 dark:text-navy-100">Total Mitra PPL</h4>
                        </div>
                        <div class="mt-5">
                            <span class="text-4xl tracking-tight text-primary dark:text-accent-light counter" data-target="{{ $totalJurusan }}">0</span>
                        </div>
                        <div class="mt-8">
                            <a href="{{ route('mitra.index') }}" class="btn rounded-full border border-slate-200 font-medium text-primary hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-500 dark:text-accent-light dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90">
                                Lihat Detail
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    {{-- Pimpinan --}}
    <div class="bg-white dark:bg-navy-600 dark:text-primary p-8 rounded-xl mt-10">
        <section id="pimpinan" class="mx-4">
            <h2 class="text-center mb-4 mt-2 text-2xl font-bold mb-6">Pimpinan Sekolah</h2>
            <div x-init="$nextTick(()=>$el._x_swiper = new Swiper($el,{ navigation: {prevEl: '.swiper-button-prev', nextEl: '.swiper-button-next'}, pagination: { el: '.swiper-pagination',type: 'progressbar'},lazy: true,}))" class="swiper rounded-lg">
                <div class="swiper-wrapper">
                    @foreach($pimpinan as $p)
                    <div class="swiper-slide flex flex-col items-center mt-8">
                        <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" class="h-40 w-40 object-cover rounded-full border-4 border-gray-300" />
                        <div class="text-center mt-3">
                            <h3 class="text-lg font-semibold">{{ $p->nama }}</h3>
                            <p class="text-gray-500">{{ $p->jabatan }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </section>
    </div>

    {{-- Get In Touch --}}
    <div class="bg-white dark:bg-navy-600 dark:text-primary p-6 rounded-xl mt-10">
        <div class="container px-6 py-12 mx-auto">
            <div class="text-center">
                <h1 class="text-2xl font-bold text-center">Kontak</h1>
                <p>SMK Negeri 7 Makassar</p>
            </div>

            <div class="grid grid-cols-1 gap-12 mt-10 md:grid-cols-2 lg:grid-cols-3">
                <div class="flex flex-col items-center justify-center text-center">
                    <span class="p-3 text-blue-500 rounded-full bg-blue-100/80">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </span>

                    <h2 class="mt-4 text-lg font-semibold">Email</h2>
                    <p class="mt-2">smk7makassar35@gmail.comn.</p>
                </div>

                <div class="flex flex-col items-center justify-center text-center">
                    <span class="p-3 text-blue-500 rounded-full bg-blue-100/80">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                    </span>

                    <h2 class="mt-4 text-lg font-semibold">Office</h2>
                    <p class="mt-2">Jl. Ince Nurdin No.35, Baru, Kec. Ujung Pandang, Kota Makassar, Sulawesi Selatan 90111</p>
                </div>

                <div class="flex flex-col items-center justify-center text-center">
                    <span class="p-3 text-blue-500 rounded-full bg-blue-100/80">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                        </svg>
                    </span>

                    <h2 class="mt-4 text-lg font-semibold">Phone</h2>
                    <p class="mt-2">04113618198</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-navy-600 dark:text-primary rounded-xl mt-10">
        <div class="container px-6 mx-auto">
            <div class="text-center">
                <p class="py-6">
                    &copy; {{ date('Y') }} SMK Negeri 7 Makassar & PPL II,  <a href="">PPG UNM Bidang Studi Informatika. </a> All rights reserved.
                </p>
            </div>
        </div>
    </div>

</x-app-layout>
