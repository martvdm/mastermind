<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loadsessiongameController extends Controller
{

###############################################
## Authors: Mart van der Molen
//
//      !!! Get method !!!
//      Push the random game ID to the blade.
////    If random game ID does not exist:
///    !Make a new random game ID and put
///    !Into game session.
###############################################
    public function index()

    {
        #####
        #      !!!Playboard!!!
        #      Creates an array that "Contains" the entire game board.
        #      Array contains:
        #          - The play board row array which , contains:
        #               - Every cell in row (stage)
        /////////////
        $playboard = Session::get('playboard');
        #  ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓
        ## Gets existing playboard array out of session
        ### !If playboard array doesn't exist:
        #  ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓
        if  (!isset($playboard)) { # If playboard doesn't exist:
                                   #  ↓
            $playboard = array(); # Say playboard is an array
            for ($i = 0; $i <= 10; $i++) { # Loop the row (Stages) 10 times in the playboard array.
            $playboard[]= ['', '', '', '']; # < The looping array. (Stages)
            }
            Session::put('playboard', $playboard); # Put the entire (empty)playboard in the session.
        }


        //////////////////////////////////////////////////////////////
        /// End playboard code
        ///
        /// Start random gameID generator
        /// //////////////////////////////////////////////////////////
        $maxcolorid = 4; ## Max INT of color ID's / Random game ID INT
        $randomgameid = Session::get('randomgameid');
        ##
        if (!isset($randomgameid)) {                ## Check on existing game-session, else? make new session + random ID
            $randomgameid = [rand(1, $maxcolorid), rand(1, $maxcolorid), rand(1, $maxcolorid), rand(1, $maxcolorid)]; ##   Makes new Random ID


            Session::put('randomgameid', $randomgameid); ## Puts Random ID in game Session

        };

        return view('testapps.gameinput', ['randomgameid' => $randomgameid, 'playboard' => $playboard]); ## Returns view with Random game ID
    }

###############################################
    ## Authors: Mart van der Molen
    //
    //      !!! Post method !!!
    //      Selects color from Html input field.
    ////    !Pushes ID of color into session.
    ///
    ///    If color variable does not exist:
    ///    !Selected id = _
    ///
    ///     Pushes selected color id into Array playboard.
###############################################
    public function store()
    {


        return view('testapps.gameinput', ['randomgameid' => Session::get('randomgameid'), 'playboard' => Session::get('playboard')]);            ## Return back to view with existing game-session
    }
}

