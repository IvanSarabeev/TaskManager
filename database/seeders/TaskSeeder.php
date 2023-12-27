<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Task 1',
            'description' => 'Description for Task 1',
            'due_date' => now()->addDays(5),
            'priority' => 'high',
        ]);

        Task::create([
            'title' => 'Task 2',
            'description' => 'Description for Task 2',
            'due_date' => now()->addDays(10),
            'priority' => 'medium',
        ]);

        for ($i = 10; $i <= 15; $i++) {
            Task::create([
                'title' => "Task number $i",
                'description' => "Description for Task $i",
                'due_date' => now()->addDays($i * 2),
                'priority' => $i % 2 == 0 ? 'medium' : 'low',
            ]);
        }
    }
}
