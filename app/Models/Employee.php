<?php

namespace App\Models;



class Employee extends BaseModel
{
    
    protected $table = 'employees';
    
    protected $fillable = [
        'title',
        'designation',
        'user_id',
        'reports_to_id',
        'user_group_id'
    ];
    
    protected $with = ['user'];
    
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
