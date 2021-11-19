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
        $selectedcolorsession = Session::get('selectedcolor');
        $selectedcolorrequest = $request->selectedcolor;
        if (isset($selectedcolorrequest)) {
            Session::put('selectedcolor' , $selectedcolorrequest);
            $selectedcolor = $selectedcolorrequest;
        } elseif (isset($selectedcolorsession)) {

            $selectedcolor = Session::get('selectedcolor');

        } else {
            $selectedcolor = '';
        }
        return view('testapps.gameinput', ['selectedcolor' => $selectedcolor, 'gameid' => Session::get('gameid')]);
    }
}
