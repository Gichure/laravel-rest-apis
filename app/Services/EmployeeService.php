<?php

namespace App\Services;
use App\Repositories\EmployeeRepository;

/**
 *
 * @author Paul
 *
 */
class EmployeeService extends BaseService implements EmployeeServiceI
{
    
    protected $repository;
    
    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }
   
}