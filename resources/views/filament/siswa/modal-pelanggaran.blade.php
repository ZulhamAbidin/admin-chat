<div class="p-6 bg-white rounded-lg shadow">
    @if($user)
        <div class="pb-4 mb-4">
            <h3 class="text-xl font-semibold mb-2">Detail Orang Tua</h3>
            <div class="space-y-1">
                <p class="text-gray-600"><span>Nama:</span> {{ $user->name }}</p>
                <p class="text-gray-600"><span>Email:</span> {{ $user->email }}</p>
                <p class="text-gray-600"><span>Telepon:</span> {{ $user->telepon ?? '-' }}</p>
            </div>
        </div>
    @endif

    @if ($pelanggaran->count() > 0)
        <div>
            <h3 class="text-xl font-semibold mb-3 pb-4 mb-4">Detail Pelanggaran</h3>
            <ul class="space-y-4">
                @foreach ($pelanggaran as $pelanggaranx)
                    <li class="p-4 border border-gray-200 rounded-md hover:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold text-gray-800">
                                {{ $pelanggaranx->jenis }}
                            </h4>
                            <time class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($pelanggaranx->tanggal)->format('d M Y H:i') }}
                            </time>
                        </div>
                        <p class="text-gray-600">
                            {{ $pelanggaranx->deskripsi ?? 'Tidak ada deskripsi' }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <p class="text-gray-500">Siswa ini belum memiliki pelanggaran.</p>
    @endif
</div>
