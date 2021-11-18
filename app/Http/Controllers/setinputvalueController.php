<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class setinputvalueController extends Controller
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
}
