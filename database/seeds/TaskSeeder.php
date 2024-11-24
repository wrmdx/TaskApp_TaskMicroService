<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Inserting sample tasks
        DB::table('tasks')->insert([
            [
                'name' => 'Test Task 1',
                'description' => 'This is a test task description.',
                'status' => 'open',
                'priority' => 'high',
                'due_date' => Carbon::now()->addDays(5),
                'assigned_user_id' => 1,
                'created_by' => 1,
                'updated_by' => 1,
                'project_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Test Task 2',
                'description' => 'This is another test task description.',
                'status' => 'in progress',
                'priority' => 'medium',
                'due_date' => Carbon::now()->addDays(10),
                'assigned_user_id' => 2,
                'created_by' => 1,
                'updated_by' => 1,
                'project_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Test Task 3',
                'description' => 'This is a test task description for testing.',
                'status' => 'closed',
                'priority' => 'low',
                'due_date' => Carbon::now()->addDays(15),
                'assigned_user_id' => 3,
                'created_by' => 1,
                'updated_by' => 1,
                'project_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
