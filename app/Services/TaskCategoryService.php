<?php

namespace App\Services;
use App\Repositories\TaskCategoryRepository;

/**
 *
 * @author Paul
 *
 */
class TaskCategoryService extends BaseService implements TaskCategoryServiceI
{
    
    protected $repository;
    
    public function __construct(TaskCategoryRepository $repository)
    {
        $this->repository = $repository;
    }
   
}