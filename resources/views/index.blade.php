@extends('layouts.global')
@extends('components.navigation')
@section('extracss')

    <link rel="stylesheet" type="text/css" href="/css/components/popup.css"> @endsection
@section('extrascript')
    <script src="/js/SearchBar.js"></script> @endsection
@section('assets')


    <div class="floatcard"
         style="width: 23vw;margin-left: 3%; margin-top: 7%; max-width: 23rem; flex-direction: column">
        <h1 style="margin-bottom: 2%">Mastermind-BarryBoter</h1>
        <p style="font-size: 1.25rem">
            Welkom op BarryBoter! Barryboter is een project van 2 studenten die Software Development studeren. Volgens
            de opdracht hebben de studenten Mastermind zo goed mogelijk moeten nabootsen.
            <br><br>
            Start jou avontuur en klik 'Spelen maar!'
        </p>
        <div class="footer">
            <button onclick="DivToggle('leaderboard')">Leaderbord</button>
            <a href="/mastermind/gameinput">
                <button>Spelen maar!</button>
            </a></div>
    </div>
    <img src="/images/Wijzendebarry.png"
         style="width: 25rem; height: auto; display: flex; position: relative; margin: auto; margin-right: 10rem">


    <div class="popup" id="leaderboard" style="visibility: hidden;flex-direction: column">
        <div class="top">
            <div class="close">🔍</div>
            <h1>Leaderboard</h1>
            <div onclick="DivToggle('leaderboard')" class="close">☓</div>
        </div>
        <input type="text" id="searchbar" placeholder="Zoeken..." onkeyup="myFunction()">
        <div class="column leaderboard" id="searcharea" style="flex-direction: column;">
            <div class="row" style="margin-top: 5%">
                <label>Place</label>
                <label>User</label>
                <label>Score</label>
                <label style="width: min-content; margin-right: 7%">Difficulty</label>
            </div>
            @foreach($games as $game)
                <div class="row"><p class="placement{{$loop->index+1}}">#{{$loop->index+1}} </p><label> <img
                            class="profilepicture" style="width: 2rem; height: 2rem" src="
            @if(isset($users[$game->user_id]['picture']))
                            /uploads/pictures/{{$users[$game->user_id]['picture']}}
                        @else
                            /images/user-64.png
@endif
                            ">
                        <div class="columndirector"><p>{{ $users[$game->user_id]['name'] }}</p>
                            <p>Lvl.{{ $users[$game->user_id]['level'] }}</p></div>
                    </label>
                    <label>{{$game->score}}</label>

                    @if($game->difficulty == 0.5)
                        <label style="color: white; background: lightgreen; width: min-content;margin-right: 5%;"
                               class="difficulty">{{__('Easy')}}</label>
                    @elseif($game->difficulty == 1)
                        <label style="color: white; background: orange; width: min-content;margin-right: 5%;"
                               class="difficulty">{{__('Normal')}}</label>
                    @elseif($game->difficulty == 1.5)
                        <label style="color: white; background: darkred; width: min-content; margin-right: 7%;"
                               class="difficulty">{{__('Hard')}}</label>
                    @endif

                </div>

            @endforeach

        </div>

    </div>





@endsection
