<div x-init="$nextTick(() => {
            new Swiper('.swiper', {
                navigation: { prevEl: '.swiper-button-prev', nextEl: '.swiper-button-next' },
                pagination: { el: '.swiper-pagination', type: 'progressbar' },
                lazy: true,
                autoplay: { delay: 3000, disableOnInteraction: false },
                loop: true
            });
        })" class="swiper rounded-md">

    <div class="swiper-wrapper">
        @php
        $jumbotrons = \App\Models\Jumbotron::latest()->get();
        @endphp

        @foreach($jumbotrons as $jumbotron)
        <div class="swiper-slide relative bg-cover rounded-md bg-center h-64 md:h-96" style="background-image: url('{{ asset('storage/' . $jumbotron->image) }}')">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-center text-white p-4">
                <h1 class="text-3xl md:text-5xl font-bold">{{ $jumbotron->title }}</h1>
                @if ($jumbotron->description)
                <p class="mt-2 text-lg md:text-xl">{{ $jumbotron->description }}</p>
                @endif
                @if ($jumbotron->button_text && $jumbotron->button_link)
                <a href="{{ url($jumbotron->button_link) }}" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    {{ $jumbotron->button_text }}
                </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
