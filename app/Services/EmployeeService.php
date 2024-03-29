<?php

namespace App\Services;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use App\Repositories\TaskRepository;

/**
 *
 * @author Paul
 *
 */
class EmployeeService extends BaseService implements EmployeeServiceI
{
    
    private $userRepository;

    private $taskRepository;
    
    public function __construct(EmployeeRepository $repository, UserRepository $userRepository, TaskRepository $taskRepository)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->taskRepository = $taskRepository;
    }
    
    public function create(array $attributes)
    {
        $user = $this->userRepository->create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'password' => Hash::make($attributes['email'])
        ]);
        return $this->repository->create([
            'title' => $attributes['title'],
            'designation' => $attributes['designation'],
            'user_id' => $user->id,
            'user_group_id' => $attributes['user_group_id'],
            'reports_to_id' => $attributes['reports_to_id'],
        ]);
    }
    
    public function delete($id)
    {
        $employee = $this->repository->find($id);
        $employee->delete();
        if($employee->user_id != null)
            $this->userRepository->delete($employee->user_id);
        
        return $employee;
    }

    public function tasks($id){
        $tasks = $this->taskRepository->all(['employee_id' => $id]);
        return $tasks;
    }
   
}