<div>
    <ul>
        @foreach ($categories as $category)
        <li>
            <a href="{{ route('kategori.postingan', $category->slug) }}" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all 
                      hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 
                      dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">
                {{ $category->name }}
            </a>
        </li>
        @endforeach
    </ul>
    <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
    <ul>
        <li>
            <a href="{{ route('welcome') }}#postingan" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Postingan Terbaru</a>
        </li>
    </ul>

</div>
