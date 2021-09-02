<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->insert([
            'title' => "Beginner",
            'nb_achievement' => 0,
        ]);
        DB::table('badges')->insert([
            'title' => "Intermediate",
            'nb_achievement' => 4,
        ]);
        DB::table('badges')->insert([
            'title' => "Advanced",
            'nb_achievement' => 8,
        ]);
        DB::table('badges')->insert([
            'title' => "Master",
            'nb_achievement' => 10,
        ]);
    }
}
