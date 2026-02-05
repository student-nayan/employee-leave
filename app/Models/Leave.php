<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';        
    protected $primaryKey = 'id';      
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'leave_type',
        'from_date',
        'to_date',
        'description',
        'status',
    ];
    // public function employee()
    // {
    //     return $this->belongsTo(Employee::class, 'user_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    
}
