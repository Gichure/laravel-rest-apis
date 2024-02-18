<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Services\BaseServiceI;
use App\Services\BaseService;
use App\Services\EmployeeServiceI;
use App\Services\EmployeeService;
use App\Services\TaskServiceI;
use App\Services\TaskActivityServiceI;
use App\Services\TaskActivityService;
use App\Services\TaskCategoryServiceI;
use App\Services\TaskCategoryService;
use App\Services\UserGroupServiceI;
use App\Services\UserGroupService;
use App\Services\UserServiceI;
use App\Services\UserService;

class AppServiceProvider extends ServiceProvider
{
    
    private $services = [
        BaseServiceI::class => BaseService::class,
        
        EmployeeServiceI::class => EmployeeService::class,
        TaskServiceI::class => EmployeeService::class,
        TaskActivityServiceI::class => TaskActivityService::class,
        TaskCategoryServiceI::class => TaskCategoryService::class,
        
        UserGroupServiceI::class => UserGroupService::class,
        UserServiceI::class => UserService::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->services as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultstringLength(255);
    }
}
