<?php


namespace App\Services;


/**
 *
 * @author Paul
 *
 */
interface TaskServiceI extends BaseServiceI
{

    public function assign($taskId, $employeeId);

    public function getPendingTasks($employeeId);

    public function getPendingTasksByGroup($groupId);
    
}