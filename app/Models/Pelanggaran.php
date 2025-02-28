<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'pelanggaran';

    protected $fillable = [
        'siswa_id',
        'jenis',
        'deskripsi',
        'tanggal',
    ];
    protected $casts = [
        'tanggal' => 'datetime', // Pastikan tanggal otomatis di-cast ke datetime
    ];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'pelanggaran_siswa');
    }
}