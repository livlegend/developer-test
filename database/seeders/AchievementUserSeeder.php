<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achievement_user')->insert([
            'achievement_id' => 2,
            'user_id'=>1
        ]);
        DB::table('achievement_user')->insert([
            'achievement_id' => 7,
            'user_id'=>1
        ]);
    }
}
