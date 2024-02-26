<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills');
    }

    public function userSkills()
    {
        return $this->hasMany(UserSkill::class);
    }
}
