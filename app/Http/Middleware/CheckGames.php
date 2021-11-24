<?php

namespace App\Http\Middleware;

use App\Models\DataLayer;
use Closure;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class CheckGames
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
        $dl = new DataLayer();
        $idGame = $request->route()->parameter('idGame');
        $idUser = Auth::id();

        if ($request->routeIs('dashboard')) {
            //
        }

        if ($request->routeIs('dashboard.eliminaPrenotazione')) {

            $playersGame = $dl->getNumberPlayersGame($idGame);

            if ($playersGame > 1) {
                return redirect('dashboard')->with('msg_delete_error', 'Non è possibile rimuovere una prenotazione con altri partecipanti!');
            }

            return $next($request);
        }

        if ($request->routeIs('dashboard.aggiornaRisultato')) {
            $game = Game::find($idGame);

            $result = $game->users()->where('game_id', $idGame)->first()->pivot->result;

            // if ($result != -1) {
            //     return redirect('dashboard')->with('msg_delete_error', 'Non è possibile modificare un risultato già registrato!');
            // }

            if ($dl->getNumberPlayersGame($idGame) < 4) {
                return redirect('dashboard')->with('msg_delete_error', 'Non è possibile registrare un risultato di una partita con meno di 4 giocatori!');
            }

            return $next($request);
        }

        if ($request->routeIs('partite.partecipazione')) {
            $game = Game::find($idGame);

            if ($game->level < Auth::user()->level) {
                return redirect('dashboard')->with('msg_delete_error', 'Non è possibile partecipare ad una partita con un livello inferiore al tuo!');
            }
        }

        return $next($request);
    }
}
