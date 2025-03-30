<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'movie_id',
        'content',

    ];

    public $timestamps = false;

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    // Quan hệ với Movie
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id','id');
    }
}
