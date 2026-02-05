<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'Department_Name',
        'Department_Short_Name',
        'Department_Code'
    ];
}
