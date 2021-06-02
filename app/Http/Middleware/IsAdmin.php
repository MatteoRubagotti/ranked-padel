<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DataLayer;

class IsAdmin
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
        if (auth()->user()->is_admin == null) {
            if (
                $request->routeIs('campi.prenotazione') ||
                $request->routeIs('partite.partecipazione') ||
                $request->routeIs('campi.prenota') ||
                $request->routeIs('partite.partecipa') ||
                $request->routeIs('user.dashboard') ||
                $request->routeIs('partite')
            ) {
                return $next($request);
            } else {
                return abort(403, "ATTENZIONE! Non hai i permessi per accedere a questa pagina!");
            }
        }

        if (auth()->user()->is_admin == 1) {

            $dl = new DataLayer();

            if ($request->routeIs('user.dashboard')) { // 
                return Redirect::to(route('admin.dashboard'));
            }

            if (
                $request->routeIs('campi.prenotazione') ||
                $request->routeIs('partite.partecipazione') ||
                $request->routeIs('campi.prenota') ||
                $request->routeIs('partite.partecipa') ||
                $request->routeIs('partite')
            ) {
                return abort(403, "ATTENZIONE! L'amministratore non può prenotare e/o partecipare alle partite!");
            }

            return $next($request);
        }
    }
}
