@extends('layouts.global')
@extends('components.navigation')
@section('extracss')

    <link rel="stylesheet" type="text/css" href="/css/components/popup.css"> @endsection
@section('extrascript')
    <script src="/js/SearchBar.js"></script> @endsection
@section('assets')
    <x-alertvisualiser></x-alertvisualiser>

    <div class="floatcard"
         style="width: 30%;margin-left: 3%; margin-top: 2%; max-width: 30rem; flex-direction: column">
        <h1 style="margin-bottom: 2%">Mastermind-BarryBoter</h1>
        <p style="font-size: 1.25rem">
            Welkom op BarryBoter! Barryboter is een project van 2 studenten die Software Development studeren. Volgens
            de opdracht hebben de studenten Mastermind zo goed mogelijk moeten nabootsen.
            <br><br>
            Start jou avontuur en klik 'Spelen maar!'
        </p>
        <div class="footer">
            <button onclick="DivToggle('leaderboard')">Leaderbord</button>
            <a onclick="DivToggle('gameselector')">
                <button>Spelen maar!</button>
            </a></div>
    </div>
    <img src="/images/Wijzendebarry.png"
         style="width: 25vw; height: auto; display: flex; position: relative; margin: auto; margin-right: 10rem">


    <div class="popup" id="leaderboard" style="visibility: hidden;flex-direction: column; height: 80%">
        <div class="top">
            <div class="close">🔍</div>
            <h1>Leaderboard</h1>
            <div class="close"  onclick="DivToggle('leaderboard')">☓</div>
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

    <div class="popup" id="gameselector" style="width: 80%;visibility: hidden; flex-direction: column">
        <div class="top">
            <p style="padding-inline: 1rem"></p>
            <h1>{{__('gameselector')}}</h1>
            <div onclick="DivToggle('gameselector')" class="close">x</div>
        </div>
{{--        <p style="font-size: 1.2rem;margin-inline: auto;">Kies hier de spelmodus:</p>--}}
        <div class="rowdirector" style="height: 100%; justify-content: space-between;width: 100%">
            <div style="padding-inline: 3%;width: 100%; height: auto; border-right: 1px lightgrey solid;"
                 class="columndirector">
                <h2 style="margin-inline: auto;margin-bottom: 5%; color: #00dd83">Makkelijk</h2>
                <li style="color: indianred">-0.5x Score</li>
                <li style="color: indianred; margin-bottom: 5%">Minder uitdagend</li>
                <li style="color: #00dd83">Meer winkans</li>
                <li style="color: #00dd83;margin-bottom: 5%">Beginner proof</li>
                <li>Antwoord: 4 lang</li>
                <li>Antwoord: Heeft geen duplicaten</li>
                <a style="margin-top: auto" href="/mastermind/create/easy"> <button><img src="/images/play-256.png"></button></a>
                <label>Vanaf level 1</label>
            </div>
            <div style="padding-inline: 3%; width: 100%; height: auto; border-right: 1px lightgrey solid;"
                 class="columndirector @if(Auth::user() && Auth::user()->experience->level < 5)
                     blackwhite
@endif">
                <h2 style="margin-inline: auto;margin-bottom: 5%; color: var(--primary-color)">Normaal</h2>
                <li style="color: var(--primary-color)">1.0x score</li>
                <li style="color: var(--primary-color); margin-bottom: 5%">Gemiddelde uitdaging</li>
                <li>Antwoord: 4 lang</li>
                <li>Antwoord: Heeft wel duplicaten</li>
                <a style="margin-top: auto" href="/mastermind/create/normal">  <button><img src="
                @if(Auth::user() && Auth::user()->experience->level < 5)
                        /images/lock-7-256.png
@else
                        /images/play-256.png
@endif

                            "></button></a>
                <label>Vanaf level 5</label>
            </div>
            <div style="padding-inline: 3%;width: 100%; height: auto;"
                 class="columndirector @if(Auth::user() && Auth::user()->experience->level < 20)
                     blackwhite
@endif"><h2
                    style="margin-inline: auto;margin-bottom: 5%; color: orange">Moeilijk</h2>
                <li style="color: indianred; ">Moeilijk</li>
                <li style="color: indianred;margin-bottom: 5%">Weinig winkans</li>
                <li style="color: #00dd83;margin-bottom: 5%">1.5x score</li>
                <li style="color: #00dd83;margin-bottom: 5%">Meer kans op een leaderbord plaats!</li>
                <li>Antwoord: 6 lang</li>
                <li>Antwoord: Heeft wel duplicaten</li>

                <a style="margin-top: auto" href="/mastermind/create/hard"> <button><img src="
                @if(Auth::user() && Auth::user()->experience->level < 20)
                        /images/lock-7-256.png
@else
                        /images/play-256.png
@endif
                            "></button></a>
                <label>Vanaf level 20</label>
            </div>
        </div>

    </div>



@endsection
