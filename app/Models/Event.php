<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'date_event', 'location',
    ];

    public function participants()
    {
        return $this->hasMany(EventParticipant::class);
    }
}
