<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employees';
    
    protected $fillable = [
        'title',
        'designation',
        'user_id',
        'reports_to_id',
        'user_group_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function supervisor(){
        return $this->belongsTo(Employee::class, 'reports_to_id');
    }
    
    public function group(){
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }
}
