<?php

namespace App\Services;
use App\Repositories\TaskRepository;

/**
 *
 * @author Paul
 *
 */
class TaskService extends BaseService implements TaskServiceI
{
    
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function assign($taskId, $employeeId){
        $task = $this->repository->find($taskId);
        $task->employee_id = $employeeId;
        $task->save();

        return $task;
    }

    public function getPendingTasks($employeeId){
        return $this->repository->getPendingTasks($employeeId);
    }

    public function getPendingTasksByGroup($groupId){
        return $this->repository->getPendingTasksByGroup($groupId);
    }
   
}