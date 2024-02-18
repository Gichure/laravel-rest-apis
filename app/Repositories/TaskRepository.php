<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use App\Models\Task;


/**
 *
 * @author Paul
 *
 */
class TaskRepository extends BaseRepository
{
    
    public function __construct(Task $model)
    {
        $this->model = $model;
    }
    
}