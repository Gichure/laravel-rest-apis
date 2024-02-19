<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserGroup;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\TaskCategory;
use App\Models\Employee;

class StartupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => Carbon::now()
        ]);
        
        $employee = Employee::create([
            'title' => 'MR.',
            'designation' => 'Administrator',
            'user_id' => $user->id,
            'reports_to_id' => null,
            'user_group_id' => null
        ]);
        
        $group = UserGroup::create([
            'name' => 'Default',
            'email' => $user->email,
            'supervisor_id' => $employee->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        $employee->user_group_id = $group->id;
        $employee->save();
        
        TaskCategory::create([
            'name' => 'Default',
            'user_group_id' => $group->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        
    }
}
