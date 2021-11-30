<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use App\Models\User;
use App\Models\Field;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Debugbar;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showUserDashboard()
    {
        $dl = new DataLayer();
        $reservations = $dl->getReservations(Auth::id());

        $fields = array(); // key = game_id => value = field
        $playersPerGame = array(); // key = game_id => value = number of players

        foreach ($reservations as $game) {
            $fields[$game->id] = Field::find($game->field_id);

            $players = $dl->getNumberPlayersGame($game->id);
            $playersPerGame[$game->id] = $players;
        }

        $userGames = $dl->getUserGames(Auth::id());

        $playersPerUserGames = array();
        $fieldsUserGames = array();

        foreach ($userGames as $game) {
            $fieldsUserGames[$game->id] = Field::find($game->field_id);

            $players = $dl->getNumberPlayersGame($game->id);
            $playersPerUserGames[$game->id] = $players;
        }

        $fieldsUserPastGames = array();
        $playersPerUserPastGames = array();
        $results = array(); // key = id_game => value = result

        $user = User::find(Auth::id());
        $userPastGames = $dl->getAllUserPastGame(Auth::id()); // To compute wins/losts

        $index = 0;
        $wins = 0;
        $losts = 0;

        foreach ($userPastGames as $game) {

            // Compute the number of wins/losts
            if ($game->pivot->result == 1) {
                $wins++;
            }

            if ($game->pivot->result == 0) {
                $losts++;
            }
        }

        $userPastGames = $dl->getUserPastGame(Auth::id()); // Paginate

        foreach ($userPastGames as $game) {

            // Display only games with 4 players 
            if ($dl->getNumberPlayersGame($game->id) < 4) {
                $userPastGames[$index] = null;
            } else {
                $fieldsUserPastGames[$game->id] = Field::find($game->field_id);

                $players = $dl->getNumberPlayersGame($game->id);
                $playersPerUserPastGames[$game->id] = $players;

                foreach ($user->games as $game) {
                    $results[$game->id] = $game->pivot->result;
                }
            }

            $index++;
        }

        $levelStrings = $this->computeLevelString();

        return view('user.userDashboard')->with('user', Auth::user())
            ->with('levelString', $levelStrings['levelString'])
            ->with('levelRate', $levelStrings['levelRate'])
            ->with(['reservations' => $reservations, 'fields' => $fields, 'players' => $playersPerGame]) // Reservations of the user
            ->with(['userGames' => $userGames, 'playersUserGames' => $playersPerUserGames, 'fieldsUserGames' => $fieldsUserGames]) // Games of the user
            ->with(['userPastGames' => $userPastGames, 'fieldsUserPastGames' => $fieldsUserPastGames, 'playersPerUserPastGames' => $playersPerUserPastGames, 'results' => $results]) // Games played by the user
            ->with(['wins' => $wins, 'losts' => $losts]);
    }

    public function eliminaPartita(Request $request, $idGame)
    {
        $dl = new DataLayer();

        $dl->removeUserFromGame($idGame);

        return Redirect::to(route('user.dashboard'))->with(['msg_delete' => 'La tua partecipazione alla partita è stata rimossa con successo!']);;
    }

    public function eliminaPrenotazione(Request $request, $idGame)
    {
        $dl = new DataLayer();

        $dl->removeUserReservation($idGame);

        return Redirect::to(route('user.dashboard'))->with(['msg_delete' => 'La prenotazione è stata rimossa con successo!']);
    }

    public function aggiornaRisultato(Request $request, $idGame)
    {

        $dl = new DataLayer();

        $result = $request->input('result');

        $dl->updateResult($idGame, $result);

        return Redirect::to(route('user.dashboard'))->with(['result_msg' => "Risultato aggiornato con successo!"]);
    }

    public function aggiornaProfilo(Request $request)
    {
        $request->validate([
            'email' => [
                'email',
                'string',
                'max:255',
                Rule::unique('users')->ignore(Auth::id()),
            ],
        ]);

        $dl = new DataLayer();

        $email = $request->input('email');

        $age = $request->input('age');

        if ($dl->updateProfileUser(Auth::id(), $email, $age)) {
            return Redirect::to(route('user.dashboard'))->with(['result_msg' => "Dati del profilo aggiornati con successo!"]);
        }
    }

    protected function computeLevelString()
    {
        $levelString = '';

        if (Auth::user()->level == 0) {
            $levelString = 'Principiante';
            $levelRate = 25;
        }
        if (Auth::user()->level == 1) {
            $levelString = 'Dilettante';
            $levelRate = 50;
        }
        if (Auth::user()->level == 2) {
            $levelString = 'Campione';
            $levelRate = 75;
        }
        if (Auth::user()->level == 3) {
            $levelString = 'Leggenda';
            $levelRate = 100;
        }

        return ['levelString' => $levelString, 'levelRate' => $levelRate];
    }

    public function showAdminDashboard()
    {
        $dl = new DataLayer();

        $reservations = $dl->allGames();
        $fieldsReservations = array();
        $players = array();
        $fields = array();
        $fieldsDelete = array();

        foreach ($reservations as $game) {
            $fieldsReservations[$game->id] = $dl->getField($game->field_id);
            $players[$game->id] = $dl->getNumberPlayersGame($game->id);
        }

        $fields = $dl->listFields();

        foreach ($fields as $field) {
            if ($dl->fieldWithGames($field->id)) {
                $fieldsDelete[$field->id] = false;
                continue;
            }

            $fieldsDelete[$field->id] = true;
        }

        return view('admin.adminDashboard')
            ->with('user', Auth::user())
            ->with([
                'reservations' => $reservations,
                'fields' => $fieldsReservations,
                'players' => $players,
                'allFields' => $fields,
                'fieldsDelete' => $fieldsDelete,
            ]);
    }

    public function addNews(Request $request)
    {
        $dl = new DataLayer();

        $dl->addNews($request->input('title'), $request->input('description'));
        return Redirect::to(route('admin.dashboard'))->with('msg_novità', 'Novità aggiunta e visualizzabile nella Home!');
    }

    public function addField(Request $request)
    {
        $dl = new DataLayer();

        $dl->addField($request->input('nameField'), $request->input('available'), $request->input('indoor'));

        return Redirect::to(route('admin.dashboard'))->with('msg_field', 'Campo aggiunto correttamente. Ora è visualizzabile nella lista "I miei campi"!');
    }

    public function editField(Request $request, $idField)
    {
        $dl = new DataLayer();

        $dl->editField($idField, $request->input('nameField'), $request->input('available'), $request->input('indoor'));
        
        return Redirect::to(route('admin.dashboard'))->with('msg_field', 'Campo modificato con successo!');
    }

    public function removeField($idField)
    {
        $dl = new DataLayer();

        $dl->removeField($idField);

        return Redirect::to(route('admin.dashboard'))->with('msg_field', 'Campo eliminato con successo!');
    }

    public function ajaxCheckEmail(Request $request)
    {
        $dl = new DataLayer();

        $email = $request->input('email');

        Debugbar::info($email);

        $checked = $dl->checkEmail(Auth::id(), $email);
        $response = array('checked' => $checked);

        return response()->json($response);
    }
}
