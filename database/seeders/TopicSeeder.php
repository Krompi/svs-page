<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            'A94',
            'Elektrifizierung',
            'Familien-Kinder-Senioren',
            'Barrierefreiheit',
            'Mobilität',
            'Stadtentwicklung',
        ];

        foreach ($topics as $title) {
            Topic::updateOrCreate(
                ['title' => $title],
                ['published' => true]
            );
        }
    }
}
