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
                $filledcells = $filledcells + 1; //Variable checked of alle cellen in currentstage zijn gevuld
            }
        }


        if (count($playboard[$currentstageindex]) == count(array_keys($playboard[$currentstageindex]))) {
            $index = -1;
            $randomgameidcheck = $randomgameid;
            $checkedifcellgood = false;
            foreach ($playboard[$currentstageindex] as $singlecell) {
                $index++;

                if ($singlecell == $randomgameid[$index] && $checkedifcellgood === false) {
                    $playboardcheck[$currentstageindex][2] = $playboardcheck[$currentstageindex][2] + 1; # staat voor Goed
                    $randomgameidcheck[$index] = '';
                }

                if ($index === array_key_last($randomgameid)) {
                    $checkedifcellgood = true;
                    $index = -1;
                }
            }
            if ($checkedifcellgood === true) {
                foreach ($playboard[$currentstageindex] as $singlecell) {
                    $index++;
                    if (is_int($randomgameidcheck[$index])) {
                        if (in_array($singlecell, $randomgameidcheck)) {
                            $playboardcheck[$currentstageindex][1] = $playboardcheck[$currentstageindex][1] + 1; # staat voor bevatten

                        } else {
                            $playboardcheck[$currentstageindex][0] = $playboardcheck[$currentstageindex][0] + 1; # 0 staat voor fout

                        }
                    }
                }

            }
        }
        if ($playboardcheck[$currentstageindex][2] === count($randomgameid)) {
            $victory = true;
        }
            if ($randomgameid == $playboard[$currentstageindex]) {
                Session::forget('');
                Session::flush();


        } elseif ($currentstageindex > 10) {
            Session::forget('');
            Session::flush();
        }
        if (Session::has('randomgameid') && $filledcells == 4) {
            $currentstageindex = $currentstageindex + 1;
            Session::put('currentstageindex', $currentstageindex);
            Session::put('playboardcheck', $playboardcheck);

        }

        Session::put('victory', $victory);
        return redirect('/mastermind/gameinput');


    }

}
