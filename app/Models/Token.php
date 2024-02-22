<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'token','expires_at','user_id',
    ];
    protected $table = 'tokens';
    use HasFactory;
}
