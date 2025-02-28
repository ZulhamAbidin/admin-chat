<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Firefly\FilamentBlog\Traits\HasBlog;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasBlog;
    public function canComment(): bool
    {
        // your conditional logic here
        return true;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'telepon',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi:
    //     Memiliki satu orang tua (wajib).
    //     Tidak terhubung langsung dengan siswa.
    // public function orangTua() {
    //     return $this->hasOne(Orang_tua::class, 'user_id');
    // }
    

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'user_id');
    }
    
}
