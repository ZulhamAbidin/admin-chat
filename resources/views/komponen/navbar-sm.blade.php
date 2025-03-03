<div class="bg-white dark:bg-navy-700 border-none flex sm:hidden justify-center -mx-4 h-12 items-center overflow-y-auto font-inter ">

    {{-- <div class="inline-flex">
                    <a href="index.html" class="btn space-x-2 px-2 py-1.5 text-xs+ font-medium leading-none">
                        <svg class="h-6 w-6" xmlns="../www.w3.org/2000/svg.html" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-opacity=".3" d="M5 14.059c0-1.01 0-1.514.222-1.945.221-.43.632-.724 1.453-1.31l4.163-2.974c.56-.4.842-.601 1.162-.601.32 0 .601.2 1.162.601l4.163 2.974c.821.586 1.232.88 1.453 1.31.222.43.222.935.222 1.945V19c0 .943 0 1.414-.293 1.707C18.414 21 17.943 21 17 21H7c-.943 0-1.414 0-1.707-.293C5 20.414 5 19.943 5 19v-4.94Z" />
                            <path fill="currentColor" d="M3 12.387c0 .267 0 .4.084.441.084.041.19-.04.4-.204l7.288-5.669c.59-.459.885-.688 1.228-.688.343 0 .638.23 1.228.688l7.288 5.669c.21.163.316.245.4.204.084-.04.084-.174.084-.441v-.409c0-.48 0-.72-.102-.928-.101-.208-.291-.355-.67-.65l-7-5.445c-.59-.459-.885-.688-1.228-.688-.343 0-.638.23-1.228.688l-7 5.445c-.379.295-.569.442-.67.65-.102.208-.102.448-.102.928v.409Z" />
                            <path fill="currentColor" d="M11.5 15.5h1A1.5 1.5 0 0 1 14 17v3.5h-4V17a1.5 1.5 0 0 1 1.5-1.5Z" />
                            <path fill="currentColor" d="M17.5 5h-1a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5Z" />
                        </svg>
                        <span>Postingan<span>
                    </a>
                </div> --}}
                
    <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn space-x-2 px-2 py-1.5 text-xs+ font-medium leading-none" :class="isShowPopper ? 'bg-slate-150 text-slate-800 dark:bg-navy-500 dark:text-navy-100' : 'text-slate-600 hover:text-slate-800 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-200 dark:hover:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25'">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="../www.w3.org/2000/svg.html">
                <path fill-opacity="0.5" d="M14.2498 16C14.2498 17.5487 13.576 18.9487 12.4998 19.9025C11.5723 20.7425 10.3473 21.25 8.99976 21.25C6.10351 21.25 3.74976 18.8962 3.74976 16C3.74976 13.585 5.39476 11.5375 7.61726 10.9337C8.22101 12.4562 9.51601 13.6287 11.1173 14.0662C11.5548 14.1887 12.0185 14.25 12.4998 14.25C12.981 14.25 13.4448 14.1887 13.8823 14.0662C14.1185 14.6612 14.2498 15.3175 14.2498 16Z" fill="currentColor" />
                <path d="M17.75 9.00012C17.75 9.68262 17.6187 10.3389 17.3825 10.9339C16.7787 12.4564 15.4837 13.6289 13.8825 14.0664C13.445 14.1889 12.9813 14.2501 12.5 14.2501C12.0187 14.2501 11.555 14.1889 11.1175 14.0664C9.51625 13.6289 8.22125 12.4564 7.6175 10.9339C7.38125 10.3389 7.25 9.68262 7.25 9.00012C7.25 6.10387 9.60375 3.75012 12.5 3.75012C15.3962 3.75012 17.75 6.10387 17.75 9.00012Z" fill="currentColor" />
                <path fill-opacity="0.3" d="M21.25 16C21.25 18.8962 18.8962 21.25 16 21.25C14.6525 21.25 13.4275 20.7425 12.5 19.9025C13.5763 18.9487 14.25 17.5487 14.25 16C14.25 15.3175 14.1187 14.6612 13.8825 14.0662C15.4837 13.6287 16.7787 12.4562 17.3825 10.9337C19.605 11.5375 21.25 13.585 21.25 16Z" fill="currentColor" />
            </svg>
            <span>Postingan</span>
        </button>
        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
            <div class="popper-box max-h-[calc(100vh-120px)] overflow-y-auto rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                <livewire:kategori-list />
            </div>
        </div>
    </div>

    <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
        <button x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn space-x-2 px-2 py-1.5 text-xs+ font-medium leading-none" :class="isShowPopper ? 'bg-slate-150 text-slate-800 dark:bg-navy-500 dark:text-navy-100' : 'text-slate-600 hover:text-slate-800 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-200 dark:hover:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25'">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="../www.w3.org/2000/svg.html">
                <path d="M5 8H19V16C19 17.8856 19 18.8284 18.4142 19.4142C17.8284 20 16.8856 20 15 20H9C7.11438 20 6.17157 20 5.58579 19.4142C5 18.8284 5 17.8856 5 16V8Z" fill="currentColor" fill-opacity="0.3" />
                <path d="M12 8L11.7608 5.84709C11.6123 4.51089 10.4672 3.5 9.12282 3.5V3.5C7.68381 3.5 6.5 4.66655 6.5 6.10555V6.10555C6.5 6.97673 6.93539 7.79026 7.66025 8.2735L9.5 9.5" stroke="currentColor" stroke-linecap="round" />
                <path d="M12 8L12.2392 5.84709C12.3877 4.51089 13.5328 3.5 14.8772 3.5V3.5C16.3162 3.5 17.5 4.66655 17.5 6.10555V6.10555C17.5 6.97673 17.0646 7.79026 16.3397 8.2735L14.5 9.5" stroke="currentColor" stroke-linecap="round" />
                <rect x="4" y="8" width="16" height="3" rx="1" fill="currentColor" />
                <path d="M12 11V15" stroke="currentColor" stroke-linecap="round" />
            </svg>
            <span>Data Sekolah</span>
        </button>
        <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
            <div class="popper-box max-h-[calc(100vh-120px)] overflow-y-auto rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                <ul>
                    <li>
                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Peserta Didik</a>
                    </li>
                    <li>
                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Guru</a>
                    </li>
                    <li>
                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Jurusan</a>
                    </li>
                    <li>
                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Pimpinan</a>
                    </li>
                    <li>
                        <a href="#" class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Praktik Kerja Lapangan</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    @if (Auth::check())
    @php
    $user = Auth::user();
    @endphp

    @if ($user->role === 'admin' || $user->role === 'guru')

    <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
        <a href="{{ route('filament.admin.pages.dashboard') }}" x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn space-x-2 px-2 py-1.5 text-xs+ font-medium leading-none" :class="isShowPopper ? 'bg-slate-150 text-slate-800 dark:bg-navy-500 dark:text-navy-100' : 'text-slate-600 hover:text-slate-800 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-200 dark:hover:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25'">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="../www.w3.org/2000/svg.html">
                <path fill-opacity="0.5" d="M14.2498 16C14.2498 17.5487 13.576 18.9487 12.4998 19.9025C11.5723 20.7425 10.3473 21.25 8.99976 21.25C6.10351 21.25 3.74976 18.8962 3.74976 16C3.74976 13.585 5.39476 11.5375 7.61726 10.9337C8.22101 12.4562 9.51601 13.6287 11.1173 14.0662C11.5548 14.1887 12.0185 14.25 12.4998 14.25C12.981 14.25 13.4448 14.1887 13.8823 14.0662C14.1185 14.6612 14.2498 15.3175 14.2498 16Z" fill="currentColor" />
                <path d="M17.75 9.00012C17.75 9.68262 17.6187 10.3389 17.3825 10.9339C16.7787 12.4564 15.4837 13.6289 13.8825 14.0664C13.445 14.1889 12.9813 14.2501 12.5 14.2501C12.0187 14.2501 11.555 14.1889 11.1175 14.0664C9.51625 13.6289 8.22125 12.4564 7.6175 10.9339C7.38125 10.3389 7.25 9.68262 7.25 9.00012C7.25 6.10387 9.60375 3.75012 12.5 3.75012C15.3962 3.75012 17.75 6.10387 17.75 9.00012Z" fill="currentColor" />
                <path fill-opacity="0.3" d="M21.25 16C21.25 18.8962 18.8962 21.25 16 21.25C14.6525 21.25 13.4275 20.7425 12.5 19.9025C13.5763 18.9487 14.25 17.5487 14.25 16C14.25 15.3175 14.1187 14.6612 13.8825 14.0662C15.4837 13.6287 16.7787 12.4562 17.3825 10.9337C19.605 11.5375 21.25 13.585 21.25 16Z" fill="currentColor" />
            </svg>
            <span>
                Dashboard
            </span>
        </a>
    </div>

    @elseif ($user->role === 'ortu')
    <form method="POST" action="{{ route('logout') }}" x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
        @csrf
        <button type="submit" x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn space-x-2 px-2 py-1.5 text-xs+ font-medium leading-none" :class="isShowPopper ? 'bg-slate-150 text-slate-800 dark:bg-navy-500 dark:text-navy-100' : 'text-slate-600 hover:text-slate-800 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-200 dark:hover:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25'">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="../www.w3.org/2000/svg.html">
                <path fill-opacity="0.5" d="M14.2498 16C14.2498 17.5487 13.576 18.9487 12.4998 19.9025C11.5723 20.7425 10.3473 21.25 8.99976 21.25C6.10351 21.25 3.74976 18.8962 3.74976 16C3.74976 13.585 5.39476 11.5375 7.61726 10.9337C8.22101 12.4562 9.51601 13.6287 11.1173 14.0662C11.5548 14.1887 12.0185 14.25 12.4998 14.25C12.981 14.25 13.4448 14.1887 13.8823 14.0662C14.1185 14.6612 14.2498 15.3175 14.2498 16Z" fill="currentColor" />
                <path d="M17.75 9.00012C17.75 9.68262 17.6187 10.3389 17.3825 10.9339C16.7787 12.4564 15.4837 13.6289 13.8825 14.0664C13.445 14.1889 12.9813 14.2501 12.5 14.2501C12.0187 14.2501 11.555 14.1889 11.1175 14.0664C9.51625 13.6289 8.22125 12.4564 7.6175 10.9339C7.38125 10.3389 7.25 9.68262 7.25 9.00012C7.25 6.10387 9.60375 3.75012 12.5 3.75012C15.3962 3.75012 17.75 6.10387 17.75 9.00012Z" fill="currentColor" />
                <path fill-opacity="0.3" d="M21.25 16C21.25 18.8962 18.8962 21.25 16 21.25C14.6525 21.25 13.4275 20.7425 12.5 19.9025C13.5763 18.9487 14.25 17.5487 14.25 16C14.25 15.3175 14.1187 14.6612 13.8825 14.0662C15.4837 13.6287 16.7787 12.4562 17.3825 10.9337C19.605 11.5375 21.25 13.585 21.25 16Z" fill="currentColor" />
            </svg>
            <span>
                Logout
            </span>
            </a>
    </form>
    @endif

    @else
    <div x-data="usePopper({placement:'bottom-start',offset:4})" @click.outside="isShowPopper && (isShowPopper = false)" class="inline-flex">
        <a href="{{ route('filament.admin.auth.login') }}" x-ref="popperRef" @click="isShowPopper = !isShowPopper" class="btn space-x-2 px-2 py-1.5 text-xs+ font-medium leading-none" :class="isShowPopper ? 'bg-slate-150 text-slate-800 dark:bg-navy-500 dark:text-navy-100' : 'text-slate-600 hover:text-slate-800 hover:bg-slate-300/20 active:bg-slate-300/25 dark:text-navy-200 dark:hover:text-navy-100 dark:hover:bg-navy-300/20 dark:active:bg-navy-300/25'">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="../www.w3.org/2000/svg.html">
                <path fill-opacity="0.5" d="M14.2498 16C14.2498 17.5487 13.576 18.9487 12.4998 19.9025C11.5723 20.7425 10.3473 21.25 8.99976 21.25C6.10351 21.25 3.74976 18.8962 3.74976 16C3.74976 13.585 5.39476 11.5375 7.61726 10.9337C8.22101 12.4562 9.51601 13.6287 11.1173 14.0662C11.5548 14.1887 12.0185 14.25 12.4998 14.25C12.981 14.25 13.4448 14.1887 13.8823 14.0662C14.1185 14.6612 14.2498 15.3175 14.2498 16Z" fill="currentColor" />
                <path d="M17.75 9.00012C17.75 9.68262 17.6187 10.3389 17.3825 10.9339C16.7787 12.4564 15.4837 13.6289 13.8825 14.0664C13.445 14.1889 12.9813 14.2501 12.5 14.2501C12.0187 14.2501 11.555 14.1889 11.1175 14.0664C9.51625 13.6289 8.22125 12.4564 7.6175 10.9339C7.38125 10.3389 7.25 9.68262 7.25 9.00012C7.25 6.10387 9.60375 3.75012 12.5 3.75012C15.3962 3.75012 17.75 6.10387 17.75 9.00012Z" fill="currentColor" />
                <path fill-opacity="0.3" d="M21.25 16C21.25 18.8962 18.8962 21.25 16 21.25C14.6525 21.25 13.4275 20.7425 12.5 19.9025C13.5763 18.9487 14.25 17.5487 14.25 16C14.25 15.3175 14.1187 14.6612 13.8825 14.0662C15.4837 13.6287 16.7787 12.4562 17.3825 10.9337C19.605 11.5375 21.25 13.585 21.25 16Z" fill="currentColor" />
            </svg>
            <span>
                Login
            </span>
        </a>
    </div>
    @endif

</div>