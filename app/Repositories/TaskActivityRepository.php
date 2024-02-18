<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use App\Models\TaskActivity;


/**
 *
 * @author Paul
 *
 */
class TaskActivityRepository extends BaseRepository
{
    
    public function __construct(TaskActivity $model)
    {
        $this->model = $model;
    }
    
}