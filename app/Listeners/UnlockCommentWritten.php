<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Events\CommentWritten;
use App\Models\Achievement;
use App\Models\Comment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UnlockCommentWritten
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
     * @param  CommentWritten  $event
     * @return void
     */
    public function handle(CommentWritten $event)
    {
       
        $user=$event->comment->user;
        $user_comments=Comment::where('user_id',$user->id)->get();
        $nb_comments=sizeof($user_comments);
        if($nb_comments>0){
            // get the corresponding achievement
            $achievement=Achievement::where('nb_comments_written',$nb_comments)->first();
            $title=$achievement->title;
            event(new AchievementUnlocked($title,$user));
        }

         return $event;
    }
}
