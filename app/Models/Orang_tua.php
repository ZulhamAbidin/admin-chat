<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class orang_tua extends Model
{
    use HasFactory;
    protected $table = 'orang_tua';

    protected $fillable = [
        'user_id',
        'siswa_id',
        'nama',
        'telepon',
    ];

    public $timestamps = false;

    // Relasi ke User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Siswa
    public function siswa() {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
