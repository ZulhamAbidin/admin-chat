<div class="p-4">
    @if ($pelanggarans->count() > 0)
        <ul class="list-disc pl-5">
            @foreach ($pelanggarans as $pelanggaran)
                <li>
                    <strong>{{ $pelanggaran->jenis }}</strong> <br>
                    {{ $pelanggaran->deskripsi ?? '-' }} <br>
                    <small>{{ \Carbon\Carbon::parse($pelanggaran->tanggal)->format('d M Y H:i') }}</small>

                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500">Siswa ini belum memiliki pelanggaran.</p>
    @endif
</div>
