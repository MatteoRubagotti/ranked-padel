<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;
use Debugbar;

class RankingController extends Controller
{
    public function showRanking()
    {
        $dl = new DataLayer;
        $users = $dl->listUsers();

        $winsUsers = array(); $lostsUsers = array();
        $usersNotOrdered = array();

        $lastGames = array(); // key = user_id => value = last_matches (3)

        foreach ($users as $user) {
            // Change the username string for the view
            $user->username = '@' . $user->username;

            // Compute the number of win/lose foreach user
            $wins = 0;
            $losts = 0;

            $userPastGames = $dl->getAllUserPastGame($user->id);

            foreach ($userPastGames as $game) {

                if ($game->pivot->result == 1) {
                    $wins++;
                }

                if ($game->pivot->result == 0) {
                    $losts++;
                }
            }

            $winsUsers[$user->id] = $wins;
            $lostsUsers[$user->id] = $losts;
            $usersNotOrdered[$user->id] = $user;

            $lastGames[$user->id] = $dl->getUserLast3PastGame($user->id);
        }

        $users = $this->orderUsersByWins($usersNotOrdered, $winsUsers);

        return view('ranking')->with('users', $users)
            ->with(['winsUsers' => $winsUsers, 'lostsUsers' => $lostsUsers, 'lastGames' => $lastGames]);
    }

    protected function orderUsersByWins($users, $winsUsers) {
        $usersOrdered = array();

        arsort($winsUsers);
        //dd($winsUsers);

        foreach($winsUsers as $id => $wins) {
            $usersOrdered[$id] = $users[$id];
        }

        return $usersOrdered;
    }
}
