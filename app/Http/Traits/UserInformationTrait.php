<?php

namespace App\Http\Traits;

use App\Models\Achievement;
use App\Models\Badge;
use App\Models\User;

trait UserInformationTrait{
    public function getAchievements(User $user)
    {
        $name=[];
       foreach ($user->achievements as  $value) {
           $name[]=$value['title'];
       }
       return $name;
    }

    public function nextAvailableAchievements(User $user)
    {
        $next_name=[];
        foreach ($user->achievements as  $value) {
            $id_achivement=$value['id'];

            //search the next achievement
            $achievement=Achievement::find($id_achivement);
            //Check if it's lessons or comments
            if($achievement->nb_comments_written>0){
                $next=Achievement::where('id',$id_achivement+1)
                                ->where('nb_comments_written','>',0)
                                ->first();
                if($next){
                    $next_name[]=$next->title;
                }                
            }else if($achievement->nb_lessons_watched>0){
               
                $next=Achievement::where('id',$id_achivement+1)
                                ->where('nb_lessons_watched','>',0)
                                ->first();
                if($next){
                    $next_name[]=$next->title;
                } 
            }
        }
        return $next_name;
    }

    public function getCurrentBadge(User $user)
    {
        $nb_achievements=$user->achievements->count();
        $badge=Badge::where('nb_achievement','>',$nb_achievements)->first();
        if($badge){
            // get the previous achievement which is the current
            $badge=Badge::find(($badge->id)-1);

        }else{ //more achievements that badges
            $badge=Badge::orderBy('id','DESC')->first();
        }
       return $badge->title;
    }

    public function nextBadge(User $user)
    {
        $nb_achievements=$user->achievements->count();
        $badge=Badge::where('nb_achievement','>',$nb_achievements)->first();
        $next='';
        if($badge){
            $next=$badge->title;
        }
        return $next;
    }

    public function remainingToUnlockBadge(User $user)
    {
        $nb_achievements=$user->achievements->count();

        //Get the next badge
        $next_badge=Badge::where('nb_achievement','>',$nb_achievements)->first();
        $difference=0;
        if($next_badge){
            $difference=$next_badge->nb_achievement-$nb_achievements;
        }
        return $difference;
    }
}

?>