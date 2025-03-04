<?php

namespace App\Models;

use App\Models\Orang_tua;
use App\Models\Pelanggaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siswa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'siswa';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nis',
        'nama',
        'alamat',
        'tanggal_lahir',
        'jurusan_id',
        'kelas_id'
    ];

    // public function jurusan()
    // {
    //     return $this->belongsTo(Jurusan::class);
    // }

    // public function kelas()
    // {
    //     return $this->belongsTo(Kelas::class);
    // }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pelanggaran()
    {
        return $this->belongsToMany(Pelanggaran::class, 'pelanggaran_siswa', 'siswa_id', 'pelanggaran_id');
    }
}