<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends BaseModel
{

    protected $table = 'tasks';
    
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'task_priority',
        'task_status',
        'task_type',
        'employee_id',
        'user_group_id',
        'created_by_id'        
    ];
    
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
    public function group(){
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }
    
    public function activities(){
        return $this->hasMany(TaskActivity::class, 'task_id', 'id');
    }

    public function createBy(){
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
