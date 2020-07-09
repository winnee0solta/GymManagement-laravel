<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackMessages extends Model
{
    protected $fillable = [
        'user_id',
        'feedback', 
    ];
} 