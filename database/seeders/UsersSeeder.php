<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class UsersSeeder extends Seeder
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
        ]);
        
        Employee::create([
            'title' => 'MR.',
            'designation' => 'Administrator',
            'user_id' => $user->id,
            'reports_to_id' => null,
            'user_group_id' => null
        ]);
    }
}
