<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRequest extends Model
{
    protected $fillable = [
        'sender_user_id', 'receiver_user_id', 'skill_id', 'status', 'message',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_user_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_user_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
