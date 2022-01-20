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
        // configs:
        $maxcolorid = 4; ## Max INT of color ID's / Random game ID INT
        $maxguesses = 10;
        #  ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓
        ## Gets existing playboard array out of session
        ### !If playboard array doesn't exist:
        #  ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓
        if (!isset($playboard)) { # If playboard doesn't exist:
            $playboard = $this->createNewPlayboard($maxguesses);
        }



        //////////////////////////////////////////////////////////////
        /// End playboard code
        ///
        /// Start random gameID generator
        /// //////////////////////////////////////////////////////////

        $randomgameid = Session::get('randomgameid');

        ##
        if (!isset($randomgameid)) {                ## Check on existing game-session, else? make new session + random ID
            $randomgameid = $this->createRandomgameid($maxcolorid);

        };
        //////////////////////////////////////////////////////////////
        /// End random gameID generator
        ///
        /// Current stage code
        /// //////////////////////////////////////////////////////////
        $currentstageindex = Session::get('currentstageindex');
        if (!isset($currentstageindex)) {
            $currentstageindex = 0;
            Session::put('currentstageindex', $currentstageindex);
        }


        return view('mastermind.gameinput', ['randomgameid' => $randomgameid,
            'playboard' => $playboard,
            'currentstageindex' => $currentstageindex, ##Returns the stage of the playboard into blade
            'playboardcheck' =>  Session::get('playboardcheck'),
            'victory' =>  Session::get('victory'),
            'lost' =>  Session::get('lost')]);
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
    public function store(Request $request)
    {
        #####
        #      !!!Color selector!!!
        #
        #      !Creates an variable that contains the selected colorID's.
        #      !Creates an variable that checkmark a colorselector with css.
        /////////////
        $selectedcolorid = $request->selectedcolor;
        #  ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓
        ## Gets existing selectedcolorID out of session.
        ## When selectedcolorID does not exist in session:
        #  ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓
        if (isset($selectedcolorid)) { #Checks if selectedcolorID exists in session
            #  If not exists: ↓ ↓ ↓ ↓ ↓ ↓ ↓
            $selectedcolorid = $request->selectedcolor; # Get the selectedcolorID out of post.
            Session::put('selectedcolorid', $selectedcolorid); # SelectedcolorID put in session, cause session does not exist.
        } elseif (!isset($selectedcolorid)) {
            $selectedcolorid = Session::get('selectedcolorid');
        }
        //////////////////////////////////////////////////////////////
        /// End: colorselector code.
        /// Start: Put in cell code.
        /// //////////////////////////////////////////////////////////
        $stageindex = $request->stageindex; #!!!Index in $Playboard[]!!!
        $cellindex = $request->cellindex;   #!!!Index in $Playboard[1]!!!
        $currentstageindex = Session::get('currentstageindex'); # Current stage
        ////

        $playboard = Session::get('playboard'); // Get playboard session
        #  ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓
        #   Import playboard, then:
        ## Check if the indexes are set and if the current stage is:
        ##      !Identical to the input stage
        #       !If the both inputs are given to the function
        #   Gives:
        #       !The index of the targetcell the value of the selectedcolorid
        #       !The playboard back to session
        #  ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓ ↓

        if (isset($stageindex) && (isset($cellindex)) && ($stageindex == $currentstageindex)) { # Check on Identical stage && If the both vars are set
            $playboard[$stageindex][$cellindex] = $selectedcolorid; # Adds the colorID to the array index of the target cell
            Session::put('playboard', $playboard); # Puts the playboard back in the session
        }


        return view('mastermind.gameinput', ['randomgameid' => Session::get('randomgameid'), ## Returns the randomgameID into blade
            'selectedcolorid' => $selectedcolorid, ## Returns the selectedcolorID into blade
            'playboard' => $playboard,  ## Returns the playboard into blade
            'currentstageindex' => $currentstageindex, ##Returns the stage of the playboard into blade
            'playboardcheck' =>  Session::get('playboardcheck')]);

    }

    /**
     * @param int $maxguesses
     * @param array $playboard
     * @return array
     */
    protected function createNewPlayboard(int $maxguesses): array
    {
#  ↓
        $playboard = array(); # Say playboard is an array
        $playboardcheck = array();
        for ($i = 0; $i < $maxguesses; $i++) { # Loop the row (Stages) 10 times in the playboard array.
            $playboard[] = [null, null, null, null]; # < The looping array. (Stages)
            $playboardcheck[] = [null, null, null];

        }

        Session::put('playboard', $playboard); # Put the entire (empty)playboard inputs in the session.
        Session::put('playboardcheck', $playboardcheck);
        return $playboard; # Put the entire (empty)playboard checks in the session.
    }

    /**
     * @param int $maxcolorid
     * @return array
     */
    protected function createRandomgameid(int $maxcolorid): array
    {
        $randomgameid = [rand(1, $maxcolorid), rand(1, $maxcolorid), rand(1, $maxcolorid), rand(1, $maxcolorid)]; ##   Makes new Random ID


        Session::put('randomgameid', $randomgameid);
        return $randomgameid; ## Puts Random ID in game Session
    }
}
