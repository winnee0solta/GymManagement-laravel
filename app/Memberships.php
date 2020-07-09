<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memberships extends Model
{
    protected $fillable = [
        'member_id',
        'deadline',
    ];
}
