<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'contact_info', 'email', 'address', 'phone',
    ];

}
