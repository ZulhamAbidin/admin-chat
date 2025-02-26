<?php

namespace App\Models;

use App\Models\Orang_tua;
use App\Models\Pelanggaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siswa extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'siswa';
    public $timestamps = false; // Tambahkan ini jika tidak ingin timestamps

    protected $fillable = [
        'user_id',
        'nis',
        'nama',
        'kelas',
        'alamat',
        'tanggal_lahir',
    ];

    // Relasi ke User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke OrangTua
    public function orangTua() {
        return $this->hasMany(Orang_tua::class, 'siswa_id');
    }

    // Relasi ke Pelanggaran
    public function pelanggaran() {
        return $this->hasMany(Pelanggaran::class, 'siswa_id');
    }
}