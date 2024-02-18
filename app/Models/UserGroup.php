<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    
    protected $table = 'user_groups';
    
    protected $fillable = [
        'name',
        'supervisor_id'
    ];
    
    public function employees(){
        return $this->hasMany(Employee::class, 'user_group_id', 'id');
    }
    
    public function supervisor(){
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }
}
