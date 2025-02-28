<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kelas extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['namaKelas'];
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswaId');
    }
}