<?php

namespace App\Models;

use App\Models\Field;
use App\Models\News;
use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Debugbar;

use function PHPUnit\Framework\isNull;

class DataLayer
{
    public function listNews()
    {
        $news = News::all()->sortByDesc('id')->take(3);

        return $news;
    }

    public function listFields()
    {
        $fields = Field::paginate(6, ['*'], 'fields_page');

        return $fields;
    }
    /**
     *  List of the games not yet expired, almost user level and not already registered to the game
     * 
     */
    public function listGames()
    {
        $user = User::where('id', Auth::id())->get();

        $games = Game::whereDate('date', '>', Carbon::now())
            ->where('level', '>=', $user[0]->level)
            ->where('owner_id', "!=", $user[0]->id)->paginate(6, ['*'], 'games_page');

        return $games;
    }

    public function allGames()
    {
        $games = Game::where('date', '>=', Carbon::now())
            ->orderBy('date')->orderBy('time')
            ->paginate(50, ['*'], 'games_page');

        return $games;
    }

    public function listUsers()
    {
        $users = User::all();
        $users = $users->whereNull('is_admin');

        return $users;
    }

    public function getField($id)
    {
        $field = Field::where('id', $id)->get();
        // get() return an array!
        return $field[0];
    }

    public function getGame($id)
    {
        $game = Game::where('id', $id)->get();
        // get() return an array!
        return $game[0];
    }

    public function getUser($id)
    {
        $user = User::where('id', $id)->get();
        // get() return an array!
        return $user[0];
    }

    public function addGame($idField, $date, $time)
    {
        $game = new Game();
        $game->owner_id = Auth::id();
        $game->field_id = $idField;
        $game->date = $date;
        $game->time = $time;
        $game->level = Auth::user()->level;
        $game->save();

        // Add automatically owner of the reservation to the game through pivot table
        $game->users()->attach(Auth::id(), ['game_id' => $game->id]);
    }

    public function addUserToGame($idGame, $idUser)
    {
        $game = $this->getGame($idGame);

        $game->users()->attach($idUser, ['game_id' => $idGame]);
    }

    public function getNumberPlayersGame($idGame)
    {
        $game = Game::find($idGame);

        $playersGame = 0;

        foreach ($game->users as $player) {
            $playersGame += 1;
        }

        return $playersGame;
    }

    public function getReservations($idUser)
    {
        $reservations = Game::where('owner_id', $idUser)
            ->where('date', '>', Carbon::now())
            ->orderBy('date')->orderBy('time')->paginate(5, ['*'], 'reservations_page');

        //dd($reservations);

        return $reservations;
    }

    public function getUserGames($idUser)
    {
        $user = User::find($idUser);

        $userGames = $user->games(); // Game_users (pivot) table

        //dd($userGames);

        $userGames = $userGames->where('users_id', $idUser)
            ->where('owner_id', '!=', $idUser)
            ->where('date', '>', Carbon::now())
            ->orderBy('date')->orderBy('time')->paginate(5, ['*'], 'userGames_page');

        //dd($userGames);

        return $userGames;
    }

    public function getUserPastGame($idUser)
    {
        $user = User::find($idUser);

        $userGames = $user->games(); // Game_users (pivot) table

        $userGames = $userGames->where('users_id', $idUser)
            ->where('date', '<=', Carbon::now())
            ->orderBy('date')->orderBy('time')->paginate(5, ['*'], 'userPastGames_page');

        Debugbar::info($userGames);

        return $userGames;
    }

    public function getAllUserPastGame($idUser)
    {
        $user = User::find($idUser);

        $userGames = $user->games(); // Game_users (pivot) table

        $userGames = $userGames->where('users_id', $idUser)
            ->where('date', '<=', Carbon::now())
            ->orderBy('date')->orderBy('time')->get();

        return $userGames;
    }

    public function getUserLast3PastGame($userID)
    {

        $last3Games = DB::table('Game_users')->where('users_id', $userID)
            ->where('result', '!=', -1)->orderByDesc('updated_at')->take(3)->get();

        return $last3Games;
    }

    public function getUserGameID($idGame)
    {
        $user = User::find(Auth::id());

        $userGame = $user->games()->where('game_id', $idGame)->get();

        //dd($userGame);

        if (count($userGame)) {
            return $userGame[0]->id;
        }

        return -1;
    }

    public function removeUserFromGame($idGame)
    {
        $user = User::find(Auth::id());

        $user->games()->detach($idGame);
    }

    public function removeUserReservation($idGame)
    {
        //$user = User::find(Auth::id());
        $game = Game::where('id', $idGame)->first();
        //dd($game);

        // Not really used, filtered by CheckGame Middleware -------------
        $game->users()->detach(); // Remove all users from the pivot table
        // ---------------------------------------------------------------

        Game::where('id', $idGame)->delete();
        //$game->delete(); // Remove reservation from Game table
        $game->save();
        //$user->games()->detach($idGame); // Remove user's participation
    }

    public function updateResult($idGame, $result)
    {
        $user = User::find(Auth::id());

        $user->games()->updateExistingPivot($idGame, ['result' => $result]);

        $this->updateUserLevel($user);
    }

    protected function updateUserLevel($user)
    {
        $pastGames = $this->getAllUserPastGame($user->id);
        $wins = 0;

        foreach ($pastGames as $game) {
            if ($game->pivot->result == 1) {
                $wins++;
            }
        }
        if ($wins > 6) {
            $user->level = 3;
            $user->save();
            return;
        }

        if ($wins > 4) {
            $user->level = 2;
            $user->save();
            return;
        }

        if ($wins > 2) {
            $user->level = 1;
            $user->save();
            return;
        }

        return;
    }

    public function addNews($title, $description)
    {
        $news = new News();

        $news->title = $title;
        $news->description = $description;
        $news->save();
    }

    public function addField($name, $available, $indoor)
    {
        $field = new Field();

        $field->name = strtolower($name);
        $field->available = $available;
        if ($indoor) {
            $field->indoor = $indoor;
        } else {
            $field->indoor = 0;
        }

        $field->save();
    }

    public function editField($idField, $name, $available, $indoor)
    {
        $field = Field::find($idField);

        $field->name = $name;
        $field->available = $available;
        if ($indoor) {
            $field->indoor = $indoor;
        } else {
            $field->indoor = 0;
        }

        $field->save();
    }

    public function getAvailableHoursByDate($date, $idField)
    {
        $games = Game::where('date', $date)
            ->where('field_id', $idField)
            ->orderBy('time')->get();

        Debugbar::info($games);

        return $games;
    }

    public function checkDateHour($date, $time, $idField)
    {
        $games = Game::where('date', $date)
            ->where('time', $time)
            ->where('field_id', $idField)
            ->get();

        if (count($games) == 0) {
            return true;
        }

        return false;
    }

    public function updateProfileUser($idUser, $email, $age)
    {
        $user = User::find($idUser);

        $user->age = $age;
        if (!is_null($email)) {
            $user->email = $email;
        }

        $user->save();

        return true;
    }

    public function checkEmail($idUser, $email)
    {
        $user = User::find($idUser);
        $userCurrentEmail = $user->email;

        $usersWithEmail = User::where('email', $email)->get();

        Debugbar::info($usersWithEmail);

        if ($userCurrentEmail == $email || count($usersWithEmail) == 0) {
            return true;
        }

        return false;
    }

    public function checkNameField($nameField)
    {
        $field = Field::where('name', $nameField)->get();

        Debugbar::info($field);

        if (count($field) == 0) {
            return true;
        }

        return false;
    }

    public function fieldWithGames($idField)
    {
        $games = Game::where('field_id', $idField)
            ->get();

        if (count($games) != 0) {
            return true;
        }

        return false;
    }

    public function removeField($idField)
    {
        Field::find($idField)->delete();
    }

    public function checkEditNameField($name, $idField)
    {
        $current_field = Field::find($idField);

        if($name == $current_field->name) {
            return true;
        }

        $fields = Field::where('name', $name)
        ->where('id', '!=', $idField)
        ->get();

        if(count($fields) > 0) {
            return false;
        }

        return true;
    }
}
