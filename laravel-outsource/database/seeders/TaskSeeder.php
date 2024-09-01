<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['name' => 'Washing section'],
            ['name' => 'Interior cleaning section'],
            ['name' => 'Service section'],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }

        $tasks = [
            ['name' => 'Full wash', 'section_id' => 1],
            ['name' => 'Body wash', 'section_id' => 1],
            ['name' => 'Vacuum', 'section_id' => 2],
            ['name' => 'Shampoo', 'section_id' => 2],
            ['name' => 'Engine oil replacement', 'section_id' => 3],
            ['name' => 'Brake oil replacement', 'section_id' => 3],
            ['name' => 'Coolant replacement', 'section_id' => 3],
            ['name' => 'Air filter replacement', 'section_id' => 3],
            ['name' => 'Oil filter replacement', 'section_id' => 3],
            ['name' => 'AC filter replacement', 'section_id' => 3],
            ['name' => 'Brake shoes replacement', 'section_id' => 3],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
