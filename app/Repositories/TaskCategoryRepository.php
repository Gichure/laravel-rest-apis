<?php
namespace App\Repositories;


use App\Models\TaskCategory;

/**
 *
 * @author Paul
 *
 */
class TaskCategoryRepository extends BaseRepository
{
    
    public function __construct(TaskCategory $model)
    {
        $this->model = $model;
    }
   
}