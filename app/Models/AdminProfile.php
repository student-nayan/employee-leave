<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    protected $fillable = [
        'name',
        'address',
        'dob',
        'phone',
        'email',
        'image',

    ];
    
}
