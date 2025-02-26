<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'pelanggaran';

    protected $fillable = [
        'siswa_id',
        'jenis',
        'deskripsi',
        'poin',
        'tanggal',
    ];

    public $timestamps = false;

    // Relasi ke Siswa
    public function siswa() {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
