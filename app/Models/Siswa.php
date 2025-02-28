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
        'kelas',
        'alamat',
        'tanggal_lahir',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pelanggarans()
    {
        return $this->belongsToMany(Pelanggaran::class, 'pelanggaran_siswa');
    }
}