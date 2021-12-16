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
        $lost = false;
        $filledcells = 0; #Start of check if the stage is fully filled with integers.

        #####
        #      !!!Filled check!!!
        #
        #      !Counts every time cell is filled +1
        /////////////

        foreach ($playboard[$currentstageindex] as $singlecellcheck) {
            if ($singlecellcheck != null) {
                $filledcells = $filledcells + 1; //Variable checked of alle cellen in currentstage zijn gevuld
            }
        }


        #####
        #      !!!Check Algorithm!!!
        #
        #      ! Checks if currentstageindex is good/fault/ingame but not right place.
        #       Algorithm first checks if good, deletes the good indexes out of the randomgameidcheck.
        #       The good cells will not be repeated in the fault/ingame but not right place check.
        #      ! If currentstageindex all correct. Victory = true
        /////////////
        if (count($playboard[$currentstageindex]) == count(array_keys($playboard[$currentstageindex]))) { //Checks currentstageindex is fully filled
            $index = -1; //Start of de upcount of index.
            $randomgameidcheck = $randomgameid; //Makes new randomgameid that will be modified if cells are good (Anti repeat already checked cells)
            $checkedifcellgood = false; // checks if the current stage index is checked of good cells.
            foreach ($playboard[$currentstageindex] as $singlecell) {
                $index++; //Start upcount of index

                if ($singlecell == $randomgameid[$index] && $checkedifcellgood === false) { //Checks if this index is correct & checked by randomgameid
                    $playboardcheck[$currentstageindex][2] = $playboardcheck[$currentstageindex][2] + 1; # Stands for good (index [2])
                    $randomgameidcheck[$index] = ''; #Deletes value of the randomgameid so will not be checked again.
                }

                if ($index === array_key_last($randomgameid)) { //Stops check if cell is correct loop
                    $checkedifcellgood = true;
                    $index = -1;
                }
            }
            if ($checkedifcellgood === true) { //starts fault/ingame but not right place check loop.
                foreach ($playboard[$currentstageindex] as $singlecell) {
                    $index++;
                    if ($randomgameidcheck[$index] > -1) { //checks if the index needs to be checked
                        if (in_array($singlecell, $randomgameidcheck)) {
                            $playboardcheck[$currentstageindex][1] = $playboardcheck[$currentstageindex][1] + 1; # Stands for exist in game not on right place

                        } else {
                            $playboardcheck[$currentstageindex][0] = $playboardcheck[$currentstageindex][0] + 1; # Stands for doesn't exist in game

                        }
                    }
                }

            }
        }
        if ($playboardcheck[$currentstageindex][2] === count($randomgameid)) { //If all indexes are correct in currentstageindex, victory = true
            $victory = true;
        }
            if ($victory === true) { //If victory is true, reset session.
                Session::forget('');
                Session::flush();


        } elseif ($currentstageindex === array_key_last($playboard)) { //If currentstageindex is above last array index, reset session.
                $lost = true;
            Session::forget('');
            Session::flush();
        }
        if (Session::has('randomgameid') && $filledcells == 4) {
            $currentstageindex = $currentstageindex + 1;
            Session::put('currentstageindex', $currentstageindex);
            Session::put('playboardcheck', $playboardcheck);

        }

        Session::put('victory', $victory);
        Session::put('lost', $lost);
        Session::put('randomgameid', $randomgameid);
        return redirect('/mastermind/gameinput');


    }

}
