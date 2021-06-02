<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Debugbar;

use App\Models\DataLayer;
use Illuminate\Support\Facades\Auth;

class FieldController extends Controller
{
    public function showCampi()
    {
        $dl = new DataLayer();
        $fields = $dl->listFields();

        return view('campi.campi')->with('fields', $fields);
    }

    public function prenotazioneCampo($id)
    {

        $dl = new DataLayer();
        $field = $dl->getField($id);

        return view('campi.prenotazioneCampo')->with('field', $field);
    }

    public function prenotaCampo(Request $request, $idField)
    {

        $time = $request->input('time') . ':00';

        $dl = new DataLayer();
        $dl->addGame($idField, $request->input('date'), $time);

        //return redirect('/dashboard')->with('gameAdded', 'La tua prenotazione è avvenuta con successo!');
        return Redirect::to(route('user.dashboard'))->with(['gameAdded' => 'La tua prenotazione è avvenuta con successo!']);
    }

    public function ajaxCheckHoursAvailable(Request $request)
    {
        $dl = new DataLayer();

        $games = $dl->getAvailableHoursByDate($request->input('date'), $request->input('idField'));
        $hoursNotAvailable = array();

        foreach ($games as $game) {
            $hour = date_format(date_create($game->time), "H");
            $hoursNotAvailable['orario'.$hour] = $hour;
        }

        //Debugbar::info($hoursNotAvailable);

        return response()->json($hoursNotAvailable);
    }

    public function ajaxCheckDateHour(Request $request) {
        $dl = new DataLayer();

        $time = $request->input('time') . ':00';

         if($dl->checkDateHour($request->input('date'), $time, $request->input('idField'))) {
             $response = array("checked" => true);
         } else {
            $response = array("checked" => false);
         }

         return response()->json($response);
    }

    public function ajaxCheckNameField(Request $request)
    {
        $dl = new DataLayer();

        if($dl->checkNameField(strtolower($request->input('name')))) {
            $response = array("checked" => true);
        } else {
           $response = array("checked" => false);
        }

        return response()->json($response);
    }

    public function ajaxCheckEditNameField(Request $request)
    {
        $dl = new DataLayer();

        if($dl->checkEditNameField($request->input('name'), $request->input('idField'))) {
            $response = array("available" => true);
        } else {
            $response = array("available" => false);
        }

        return response()->json($response);
    }
}
