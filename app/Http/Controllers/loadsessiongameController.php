<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loadsessiongameController extends Controller
{


    public function index()

    {
        $maxcolorid = 4;


        $randomgameid = Session::get('randomgameid');


        if (!isset($randomgameid)) {
            $randomgameid =
                rand(1, $maxcolorid) . rand(1, $maxcolorid) . rand(1, $maxcolorid) . rand(1, $maxcolorid);


            Session::put('randomgameid', $randomgameid);

        };

        return view('testapps.gameinput', ['randomgameid' => $randomgameid]);
    }

    public function store()
    {


        return view('testapps.gameinput', ['gameid' => Session::get('gameid')]);
    }
}

