<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $lessons = Lesson::factory()
            ->count(20)
            ->create();
        
        $users = User::factory()
        ->count(3)
        ->create();

        
        $this->call([
            AchievementsSeeder::class,
            BadgesSeeder::class,
            AchievementUserSeeder::class
        ]);    
    }
}
