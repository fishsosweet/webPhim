<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'thum',
        'active',
    ];
    public function movie()
    {
        return $this->belongsToMany(Movie::class,'movie_category','movie_id', 'category_id');
    }
}
