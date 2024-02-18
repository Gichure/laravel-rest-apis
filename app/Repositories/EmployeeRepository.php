<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;


/**
 *
 * @author Paul
 *
 */
class EmployeeRepository extends BaseRepository
{
    public function __construct(Employee $model)
    {
        $this->model = $model;
    }
   
}