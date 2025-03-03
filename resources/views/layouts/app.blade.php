<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('komponen.kepala')

    <body x-data x-bind="$store.global.documentBody" class="is-header-blur navigation:horizontal">

        @include('komponen.preload')

        <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>

            <nav class="header before:bg-white dark:before:bg-navy-750 print:hidden">
            
                <div class="header-container relative flex w-full bg-white dark:bg-navy-700 print:hidden sm:flex-col">

                    <div class="flex w-full justify-between sm:h-16">

                        @include('komponen.logo-brand')

                        <div class="flex items-center">

                            @include('komponen.search')

                            @include('komponen.navbar-xl')

                        </div>

                        @include('komponen.right-button')

                    </div>

                    @include('komponen.navbar-md')

                </div>

            </nav>

            <main class="main-content w-full px-[var(--margin-x)]">

                @include('komponen.navbar-sm')

                <div class="mt-5 md:mt-4 mb-4">

                    {{ $slot }}
                
                </div>

            </main>

        </div>

        @include('filament.sisipkan.chat-bubble-guest')

        @livewireScripts

        <script>
        
            window.addEventListener("DOMContentLoaded", () => Alpine.start());

        </script>

    </body>

</html>