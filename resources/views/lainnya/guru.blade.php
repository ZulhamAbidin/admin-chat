<x-app-layout>  
    <div class="bg-white dark:bg-navy-600 dark:text-primary p-8 rounded-xl mt-2">
        <h2 class="text-2xl font-bold mb-4">Daftar Guru</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($guru as $item)
            <div class="bg-white shadow-md p-4 rounded-lg w-full text-center">
                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="w-32 h-32 object-cover rounded-full mx-auto">
                <h3 class="text-lg font-semibold mt-4">{{ $item->nama }}</h3>
                <p class="text-gray-600">{{ $item->jabatan }}</p>
                <p class="text-gray-500 mt-2">{{ $item->alamat }}</p>
                <p class="text-gray-500 mt-2">{{ $item->no_ponsel }}</p>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>