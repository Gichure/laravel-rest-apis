<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGroup extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'user_groups';
    
    protected $fillable = [
        'name',
        'email',
        'supervisor_id'
    ];
    
    public function employees(){
        return $this->hasMany(Employee::class, 'user_group_id', 'id');
    }
    
    public function supervisor(){
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }
}
