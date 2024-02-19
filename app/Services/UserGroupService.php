<?php

namespace App\Services;
use App\Repositories\UserGroupRepository;
use App\Repositories\EmployeeRepository;

/**
 *
 * @author Paul
 *
 */
class UserGroupService extends BaseService implements UserGroupServiceI
{
    
    private $employeeRepository;
    
    public function __construct(UserGroupRepository $repository, EmployeeRepository $employeeRepository)
    {
        $this->repository = $repository;
        $this->employeeRepository = $employeeRepository;
        
    }
    
    public function employees($id){
        return $this->employeeRepository->all(['user_group_id' => $id]);
    }
   
}