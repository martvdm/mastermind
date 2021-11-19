<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loadsessiongameController extends Controller
{


public function index()

{
    $maxcolorid = 4;

    $gameid = Session::get('gameid');

    if (!isset($gameid)) {
        $gameid = [rand(1, $maxcolorid), rand(1, $maxcolorid), rand(1, $maxcolorid), rand(1, $maxcolorid)];

        Session::put('gameid', $gameid);

    };

    return view('testapps.gameinput', ['gameid' => $gameid]);
}
    public function store(Request $request)

    {
        $selectedcolorsession = Session::get('selectedcolor'); // Geselecteerde kleur in de sessie
        $selectedcolorrequest = $request->selectedcolor; // Opgevraagde geselecteerde kleur in post
        $activecellrequest = $request->activeform; // Opgevraagde id van geselecteerde doel cel
        $settedcell = ''; // het id die word doorgestuurd naar de value
        $activecellsession = Session::get('activecell');
        if (isset($activecellsession)) {
            $activecell = $activecellsession; //als active session bestaat schakel active dan naar de sessie variable
        } elseif (isset($activecellrequest)) {
            Session::put('activecell', $activecellrequest); // als active session niet bestaan zet de opgevraagde post dan naar de sessie
            $activecell = $activecellrequest;
        }
        if (isset($activecell) && $activecell == 'cell1') {
            $settedcell = $selectedcolorsession; }
//        else if ($activecell == 'cell2') {
//            $settedcell = $selectedcolor;
//        } else if ($activecell == 'cell3') {
//            $settedcell = $selectedcolor;
//        } else if ($activecell == 'cell4') {
//            $settedcell = $selectedcolor;
//        }

        // color selector
        if (isset($selectedcolorrequest)) {
            Session::put('selectedcolor' , $selectedcolorrequest);
            $selectedcolor = $selectedcolorrequest;
        } elseif (isset($selectedcolorsession)) {

            $selectedcolor = Session::get('selectedcolor');

        } else {
            $selectedcolor = '';
        }


        return view('testapps.gameinput', ['selectedcolor' => $selectedcolor, 'gameid' => Session::get('gameid'), 'settedcell' => $settedcell]);
    }
}
//, 'settedcell' => $settedcell
