<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave_Type extends Model
{
    protected $table = 'leave_types';
    protected $fillable = [
       
        'Leave_Type',
        'Leave_Description'
    ];
}
