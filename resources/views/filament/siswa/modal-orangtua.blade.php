<div class="p-4">
    @if ($user)
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Telepon:</strong> {{ $user->telepon ?? '-' }}</p>
        <p><strong>Peran:</strong> {{ ucfirst($user->role) }}</p>
        <p><strong>Dibuat Pada:</strong> {{ $user->created_at->format('d M Y H:i') }}</p>
    @else
        <p class="text-gray-500">Tidak ada data orang tua untuk siswa ini.</p>
    @endif
</div>
