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
    
    protected $repository;
    
    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }
   
}