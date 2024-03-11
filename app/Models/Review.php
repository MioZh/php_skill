<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'exchange_request_id', 'reviewer_user_id', 'reviewee_user_id', 'rating', 'comment',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_user_id');
    }

    public function reviewee()
    {
        return $this->belongsTo(User::class, 'reviewee_user_id');
    }

    public function exchangeRequest()
    {
        return $this->belongsTo(ExchangeRequest::class);
    }
}
