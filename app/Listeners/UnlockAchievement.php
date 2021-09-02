<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\BadgeUnlocked;
use App\Models\Achievement;
use App\Models\Badge;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UnlockAchievement
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
     * @param  AchievementUnlocked  $event
     * @return void
     */
    public function handle(AchievementUnlocked $event)
    {
        $title=$event->achievement_name;
        $user=$event->user;

        $to_search=$title.'%';
        $achievement=Achievement::where('title','like','%'.$title.'%')->first();

        $user->achievements()->attach($achievement->id);

        $nb_achieved=count($user->achievements);

        // get the corresponding badge to unlock

        if($nb_achieved>0){

            $badge=Badge::where('nb_achievement',$nb_achieved)->first();
            if($badge){
                event(new BadgeUnlocked($badge->title,$user));
            }
        }else{
            event(new BadgeUnlocked("Beginner",$user));
        }
       
        return $user;
    }
}
