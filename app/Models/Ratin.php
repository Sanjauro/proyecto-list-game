<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratin extends Model
{
    use HasFactory;

    protected $fillable = [
        'videogame_id',
        'user_id',
        'score',
        'title',
        'review',
    ];
}
