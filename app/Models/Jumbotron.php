<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jumbotron extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'button_text',
        'button_link',
    ];
}
