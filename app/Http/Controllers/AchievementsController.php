<?php

namespace App\Http\Controllers;

use App\Http\Traits\UserInformationTrait;
use App\Models\User;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    use UserInformationTrait;
    
    public function index(User $user)
    {
        return response()->json([
            'unlocked_achievements' => $this->getAchievements($user),
            'next_available_achievements' => $this->nextAvailableAchievements($user),
            'current_badge' => $this->getCurrentBadge($user),
            'next_badge' => $this->nextBadge($user),
            'remaing_to_unlock_next_badge' => $this->remainingToUnlockBadge($user),
        ]);
    }
}
