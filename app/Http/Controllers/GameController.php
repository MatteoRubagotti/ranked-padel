<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Debugbar;

class GameController extends Controller
{

    public function showPartite()
    {
        $dl = new DataLayer();
        $games = $dl->listGames();
        //dd($games);

        $playersPerGame = array();

        foreach ($games as $game) {
            $idGame = $game->id;
            $players = $dl->getNumberPlayersGame($idGame);
            $playersPerGame[$idGame] = $players;
        }

        // Debugbar::info($games);

        return view('partite.partite')
            ->with('games', $games)
            ->with('playersPerGame', $playersPerGame);
    }

    public function partecipazionePartita($id)
    {
        $dl = new DataLayer();
        $game = $dl->getGame($id);

        $owner = $dl->getUser($game->owner_id);
        $field = $dl->getField($game->field_id);
        $playersPerGame = $dl->getNumberPlayersGame($game->id);

        return view('partite.partecipazionePartita')->with(['game' => $game, 'owner' => $owner, 'field' => $field, 'playersPerGame' => $playersPerGame]);
    }

    public function partecipaPartita(Request $request, $idGame) {
        
        $dl = new DataLayer();
        $dl->addUserToGame($idGame, $request->input('idUser'));
        
        return Redirect::to(route('partite'))->with(['userAdded' => 'Partecipazione alla partita effettuata con successo! Puoi controllare lo stato delle tue partite nel tuo profilo']);
    }
}
