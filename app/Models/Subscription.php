<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'name',
        'plan',
        'price',
        'active',
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function totalVip()
    {
        return $this->hasMany(TotalVip::class, 'subscription_id');
    }
}
