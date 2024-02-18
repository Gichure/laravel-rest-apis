<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use App\Models\UserGroup;


/**
 *
 * @author Paul
 *
 */
class UserGroupRepository extends BaseRepository
{
    
    public function __construct(UserGroup $model)
    {
        $this->model = $model;
    }
    
}