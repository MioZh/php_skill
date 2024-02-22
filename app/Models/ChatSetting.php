<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatSetting extends Model
{
    protected $fillable = [
        'user_id', 'enable_sound_notifications', 'theme',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
