<?php

namespace Database\Seeders;

use App\Models\TaskCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TaskCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        TaskCategory::truncate();
        
        TaskCategory::create([
            'name' => 'Default',
            'user_group_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
