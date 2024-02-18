<?php
namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;


/**
 *
 * @author Paul
 *
 */
class UserRepository extends BaseRepository
{
    
    public function __construct(User $model)
    {
        $this->model = $model;
    }
   
}