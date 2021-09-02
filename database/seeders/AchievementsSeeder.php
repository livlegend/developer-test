<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achievements')->insert([
            'title' => "First Lesson Watched",
            'nb_lessons_watched'=>1
        ]);
        DB::table('achievements')->insert([
            'title' => "5 Lessons Watched",
            'nb_lessons_watched'=>5
        ]);
        DB::table('achievements')->insert([
            'title' => "10 Lessons Watched",
            'nb_lessons_watched'=>10
        ]);
        DB::table('achievements')->insert([
            'title' => "25 Lessons Watched",
            'nb_lessons_watched'=>25
        ]);
        DB::table('achievements')->insert([
            'title' => "50 Lessons Watched",
            'nb_lessons_watched'=>50
        ]);
        DB::table('achievements')->insert([
            'title' => "First Comment Written",
            'nb_comments_written'=>1
        ]);
        DB::table('achievements')->insert([
            'title' => "3 Comments Written",
            'nb_comments_written'=>3
        ]);
        DB::table('achievements')->insert([
            'title' => "5 Comments Written",
            'nb_comments_written'=>5
        ]);
        DB::table('achievements')->insert([
            'title' => "10 Comment Written",
            'nb_comments_written'=>10
        ]);
        DB::table('achievements')->insert([
            'title' => "20 Comment Written",
            'nb_comments_written'=>20
        ]);
    }
}
