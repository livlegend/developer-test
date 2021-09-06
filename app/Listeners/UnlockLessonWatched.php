<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\LessonWatched;
use App\Models\Achievement;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UnlockLessonWatched
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LessonWatched  $event
     * @return void
     */
    public function handle(LessonWatched $event)
    {
        $user=$event->user;
        $lesson=$event->lesson;

        $nb_lesons_watched=count($user->watched);
        if($nb_lesons_watched>0){
            // get the corresponding achievement
            $achievement=Achievement::where('nb_lessons_watched',$nb_lesons_watched)->first();
            $title=$achievement->title;
            event(new AchievementUnlocked($title,$user));
        }

        return $event;
    }
}
