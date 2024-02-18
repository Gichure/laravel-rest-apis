<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskActivity extends Model
{
    use HasFactory;
    
    protected $table = 'task_activities';
    
    protected $fillable = [
        'description',
        'activity_time',
        'task_id',
        'employee_id'
    ];
    
    public function task(){
        return $this->belongsTo(Task::class, 'task_id');
    }
    
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
}
