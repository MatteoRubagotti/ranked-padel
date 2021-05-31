<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Field;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Auth;

class Availability
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //dd($request->route()->parameter('idField'));

        if ($request->route()->parameter('idField') != null) { // Fields routes
            $idField = $request->route()->parameters()['idField'];
            $field = Field::find($idField);

            if (!($field->available)) {
                return Redirect::to('campi')->with('error_msg', 'Non è possibile prenotare un campo non disponibile!');
            }

            return $next($request);
        }

        if ($request->route()->parameters('idGame') != null) { // Games routes
            $idGame = $request->route()->parameters()['idGame'];

            $dl = new DataLayer();

            // Number of players > 4
            $numberPlayers = $dl->getNumberPlayersGame($idGame);

            if ($numberPlayers >= 4) {
                return Redirect::to('partite')->with('error_msg', 'Non è possibile partecipare ad una partita in cui è già stato raggiunto il massimo numero di giocatori');
            }

            // User already subscribed to a game

            if ($idGame == $dl->getUserGameID($idGame)) {
                return Redirect::to('partite')->with('error_msg', 'Non puoi partecipare ad una partita a cui appartieni già!');
            }

            if ($dl->getGame($idGame)->level < Auth::user()->level) {
                return Redirect::to('partite')->with('error_msg', 'Non puoi partecipare ad una partita di livello inferiore al tuo!');
            }

            return $next($request);
        }

        if ($request->routeIs('campi.prenota')) { // When submit the request of reservation check that not already exist a reservation on the same date/time
            $idField = $request->route()->parameters()['idField'];
            $game = Game::where('field_id', $idField)
            ->where('date', $request->input('date'))
            ->where('time', $request->input('time'))->get();

            if(count($game) != 0) {
                return Redirect::to('campi')->with('error_msg', 'Non è possibile prenotare un campo già prenotato!');
            }

            return $next($request);
        }

        return $next($request);
    }
}