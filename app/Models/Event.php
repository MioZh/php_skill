<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'created_users', 'date_event', 'location', 'places',
    ];

    public function participants()
    {
        return $this->hasMany(EventParticipant::class);
    }
}
