<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $fillable = [
        'member_id',
        'amount_paid',
        'note',
    ];
}
