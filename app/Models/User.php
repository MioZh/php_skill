<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $table = 'users';

    public function settingchat()
    {
        return $this->hasMany(ChatSetting::class);
    }

    public function skills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function exchangeRequests()
    {
        return $this->hasMany(ExchangeRequest::class, 'sender_user_id');
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class, 'users_chats');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'reviewer_user_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
