<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserGroup::create([
            'name' => 'Default',
            'email' => 'admin@test.com',
            'supervisor_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
