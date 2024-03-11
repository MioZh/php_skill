<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'enable_sound_notifications', 'theme',
    ];
}
