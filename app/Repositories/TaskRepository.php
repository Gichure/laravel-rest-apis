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

    public function getPendingTasks($employeeId){
        return $this->model->where('task_status','!=', 'COMPLETED')->where('employee_id','=', $employeeId)->get();
    }

    public function getPendingTasksByGroup($groupId){
        return $this->model->where('task_status','!=', 'COMPLETED')->where('user_group_id','=', $$groupId)->get();
    }
    
}