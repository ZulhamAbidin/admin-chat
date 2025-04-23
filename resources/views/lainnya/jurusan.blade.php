<x-app-layout>  
    <style>
        .cul {
            text-align: justify !important;
            line-height: 2 !important;
            text-indent: 20px !important;
        }
    </style>
    <div class="bg-white dark:bg-navy-600 dark:text-primary p-8 rounded-xl mt-2">
        <h2 class="text-2xl font-bold mb-4">Daftar Jurusan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($jurusan as $item)
            <div class="bg-white shadow-md p-4 rounded-lg w-full">
                <!-- Menampilkan Gambar -->
                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-full h-48 object-cover rounded-lg">

                <h3 class="text-lg font-semibold mt-4">{{ $item->nama }}</h3>
                <p class="text-gray-600 cul mt-2">{{ $item->deskripsi }}</p>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
