<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'title',
        'description',
        'country',
        'release_year',
        'duration',
        'poster_url',
        'trailer_url',
        'video_url',
        'age_restrict',
        'active',
        'views'
    ];
    public function category()
    {
        return $this->belongsToMany(Categorie::class,'movie_category','movie_id', 'category_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'movie_id','id');
    }
}
