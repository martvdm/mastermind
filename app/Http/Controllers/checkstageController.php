<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class checkstageController extends Controller
{
    ###############################################
    ## Authors: Mart van der Molen
    //
    //      !!! Get method !!!
    //      Checks the stage row
    ////    !Pushes ID of color into session.
    ///
    ///    If color variable does not exist:
    ///    !Selected id = _
    ///w
    ///     Pushes selected color id into Array playboard.
###############################################
    public function check()
    {
##############################################

        // The list of vars down here import all variables needed for this funtion.
        $randomgameid = Session::get('randomgameid'); #The random gameID and asnwer secret code
        $playboard = Session::get('playboard'); #In this array the hole playboard input will be stored
        $playboardcheck = Session::get('playboardcheck');
        $currentstageindex = Session::get('currentstageindex'); #The current stage where the game is in
        $victory = false;
        $filledcells = 0; #Start of check if the stage is fully filled with integers.

        foreach ($playboard[$currentstageindex] as $singlecellcheck) {
            if ($singlecellcheck != null) {
                $filledcells = $filledcells + 1;
            }
        }

        if (count($playboard[$currentstageindex]) == count(array_keys($playboard[$currentstageindex]))) {
            $index = -1;
            foreach ($playboard[$currentstageindex] as $singlecell) {
                $index++;
                if (in_array($singlecell, $randomgameid)) {
                    $playboardcheck[$currentstageindex][$index] = 1; # staat voor bevatten

                    
                    if ($singlecell == $randomgameid[$index]) {
                        $playboardcheck[$currentstageindex][$index] = 2; # staat voor Goed
                        $victory = true;
                    }
                } else {
                    $playboardcheck[$currentstageindex][$index] = 0; # 0 staat voor fout
                }
            }
            if ($randomgameid == $playboard[$currentstageindex]) {
                Session::forget('');
                Session::flush();
            }

        } elseif (9 > $currentstageindex) {
            Session::forget('');
            Session::flush();
        }
        if (Session::has('randomgameid') && $filledcells == 4) {
            $currentstageindex = $currentstageindex + 1;
            Session::put('currentstageindex', $currentstageindex);
            Session::put('playboardcheck', $playboardcheck);
        }


        return redirect('/testapps/gameinput');


    }

}
