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

    <!-- GSAP Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let counters = document.querySelectorAll(".counter");

            counters.forEach(counter => {
                let target = parseInt(counter.getAttribute("data-target")); // Ambil angka target
                let animationDuration = 3; // Durasi total dalam detik
                let changes = 3; // Berapa kali angka acak muncul sebelum animasi ke target
                let delayBetweenChanges = animationDuration / changes; // Interval antar perubahan angka

                let count = 0;
                let interval = setInterval(() => {
                    if (count < changes) {
                        // Buat angka acak yang selalu memiliki 3 digit
                        let randomValue = Math.floor(100 + Math.random() * 900);
                        counter.innerText = randomValue;
                        count++;
                    } else {
                        clearInterval(interval); // Hentikan perubahan angka acak setelah 3 kali
                        gsap.to(counter, {
                            innerText: target
                            , duration: 5, // Animasi transisi terakhir ke angka target
                            roundProps: "innerText"
                            , ease: "power1.out"
                        });
                    }
                }, delayBetweenChanges * 1000);
            });
        });

    </script>

    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());

    </script>

</body>

</html>
