<?php

namespace App\Services;
use App\Repositories\TaskActivityRepository;

/**
 *
 * @author Paul
 *
 */
class TaskActivityService extends BaseService implements TaskActivityServiceI
{
    
    protected $repository;
    
    public function __construct(TaskActivityRepository $repository)
    {
        $this->repository = $repository;
    }
   
}