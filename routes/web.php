<?php

use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'PageController@showHome')->name('home');
Route::get('/ranking', 'RankingController@showRanking')->name('ranking');
Route::get('/#news', 'PageController@showNews')->name('news');
Route::get('/campi', 'FieldController@showCampi')->name('campi');

Route::group(['middleware' => ['auth', 'check.games', 'verified']], function () {

    Route::group(['middleware' => ['is_admin']], function () {

        Route::get('/partite', 'GameController@showPartite')->name('partite');

        Route::get('/dashboard/user', [DashboardController::class, 'showUserDashboard'])->name('user.dashboard')->middleware('verified');

        Route::prefix('/dashboard/admin')->group(function () {
            Route::get('/', [DashboardController::class, 'showAdminDashboard'])->name('admin.dashboard');
            Route::post('/aggiungi-novità', [DashboardController::class, 'addNews'])->name('admin.aggiungiNovità');
            Route::post('/aggiungi-campo',  [DashboardController::class, 'addField'])->name('admin.aggiungiCampo');
            Route::post('/modifica-campo/{idField}',  [DashboardController::class, 'editField'])->name('admin.modificaCampo');
            Route::delete('/elimina-campo/{idField}', [DashboardController::class, 'removeField'])->name('admin.eliminaCampo');
        });

        Route::group(['middleware' => ['available']], function () {
            Route::get('/campi/{idField}/prenotazione', 'FieldController@prenotazioneCampo')->name('campi.prenotazione');
            Route::post('/campi/{idField}/prenota', 'FieldController@prenotaCampo')->name('campi.prenota');

            Route::post('/partite/{idGame}/partecipa', 'GameController@partecipaPartita')->name('partite.partecipa');
        });

        Route::get('/partite/{idGame}/partecipazione', 'GameController@partecipazionePartita')->name('partite.partecipazione');
    });

    Route::prefix('/dashboard/user')->group(function () {
        Route::post('/{idGame}/eliminaPartita', 'DashboardController@eliminaPartita')->name('dashboard.eliminaPartita');
        Route::post('/{idGame}/eliminaPrenotazione', 'DashboardController@eliminaPrenotazione')->name('dashboard.eliminaPrenotazione');
        Route::post('/{idGame}/aggiornaRisultato', 'DashboardController@aggiornaRisultato')->name('dashboard.aggiornaRisultato');
        Route::post('/aggiornaProfilo', 'DashboardController@aggiornaProfilo')->name('user.aggiornaProfilo');
    });
});
// Laravel UI Authentication (Scaffold)
Auth::routes(['verify' => true]);
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// AJAX Request
Route::get('/ajaxOrari', 'FieldController@ajaxCheckHoursAvailable');
Route::get('/ajaxOrario', 'FieldController@ajaxCheckDateHour');
Route::get('/ajaxEmail', 'DashboardController@ajaxCheckEmail');
Route::get('/ajaxNomeCampo', 'FieldController@ajaxCheckNameField');
Route::get('/ajaxModificaNomeCampo', 'FieldController@ajaxCheckEditNameField');


// Debug
Route::view('/debug', 'debug');
