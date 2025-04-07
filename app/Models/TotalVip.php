<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TotalVip extends Model
{
    use HasFactory;
    public $table = 'total_vip';
    protected $fillable=[
        'user_id',
        'subscription_id',
        'so_tien'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function goiVip()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id');
    }
}

