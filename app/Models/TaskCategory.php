<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TaskCategory extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'task_categories';
    
    protected $fillable = [
        'name',
        'user_group_id'
    ];
}
