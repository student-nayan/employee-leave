<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
    'user_id',
    'emp_number',
    'firstname',
    'lastname',
    'fullname', 
    'department',
    'email',
    'mno',
    'gender',
    'birthdate',
    'address',
    'country',
    'city',
    
    'password',
];

public function leaves()
{
    return $this->hasMany(Leave::class, 'id');
}
public function user()
    {
        return $this->belongsTo(User::class);
    }

protected static function booted()
{
    static::deleting(function ($employee) {
        if ($employee->user) {
            $employee->user->delete();
        }
    });
}

}
