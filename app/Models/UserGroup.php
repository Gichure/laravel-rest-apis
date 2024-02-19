<?php

namespace App\Models;


class UserGroup extends BaseModel
{

    protected $table = 'user_groups';
    
    protected $fillable = [
        'name',
        'email',
        'supervisor_id'
    ];
    
    protected $with = ['supervisor'];
    
    public function employees(){
        return $this->hasMany(Employee::class, 'user_group_id', 'id');
    }
    
    public function supervisor(){
        return $this->belongsTo(Employee::class, 'supervisor_id');
    }
}
