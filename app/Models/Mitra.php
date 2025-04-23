<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mitra extends Model
{
    use HasFactory;
    protected $table = 'Mitra';
    protected $fillable = ['nama', 'email', 'telepon', 'alamat', 'foto', 'deskripsi'];
}