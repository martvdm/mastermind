@extends('layouts.global')
@section('extracss')
    <link rel="stylesheet" type="text/css" href="/css/components/popup.css"> @endsection
@section('extrascript')
    <script src="/js/SearchBar.js"></script> @endsection
<body>

<x-navigation></x-navigation>

<a href="/mastermind/gameinput">
    <button class="bluebutton" style=" background: #e2e8f0; color: black">Testapps</button>
</a>
<button class="bluebutton" style="background: #e2e8f0; color: black"
        onclick="DivToggle('leaderboard')">Leaderboard
</button>
<button class="bluebutton" style="background: #e2e8f0; color: black"
        onclick="DivToggle('options')">Instellingen
</button>


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
            <div class="row"><p class="placement{{$loop->index+1}}">#{{$loop->index+1}} </p><label> <img class="profilepicture" style="width: 2rem; height: 2rem" src="
            @if(isset($users[$game->user_id]['picture']))
                    /uploads/pictures/{{$users[$game->user_id]['picture']}}
                @else
                    /images/user-64.png
@endif
                        "><div class="columndirector"> <p>{{ $users[$game->user_id]['name'] }}</p>
                        <p>Lvl.{{ $users[$game->user_id]['level'] }}</p></div></label>
                <label>{{$game->score}}</label>

                    @if($game->difficulty == 0.5)
                    <label style="color: white; background: lightgreen; width: min-content;margin-right: 5%;" class="difficulty">{{__('Easy')}}</label>
                        @elseif($game->difficulty == 1)
                    <label style="color: white; background: orange; width: min-content;margin-right: 5%;"  class="difficulty">{{__('Normal')}}</label>
                    @elseif($game->difficulty == 1.5)
                    <label style="color: white; background: darkred; width: min-content; margin-right: 5%;"  class="difficulty">{{__('Hard')}}</label>
                    @endif

                <button class="bluebutton">👁</button>
            </div>

        @endforeach

    </div>

</div>



</body>
</html>
