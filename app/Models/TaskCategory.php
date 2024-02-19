<?php

namespace App\Models;

class TaskCategory extends BaseModel
{
    
    protected $table = 'task_categories';
    
    protected $fillable = [
        'name',
        'user_group_id'
    ];
    
    protected $with = ['group'];
    
    public function group(){
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }
}
