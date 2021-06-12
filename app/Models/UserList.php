<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'videogame_id',
        'score',
        'status',
    ];

    public function videogame()
    {
        return $this->belongsTo(Videogame::class);
    }
}
