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
    <div class="column" id="searcharea" style="flex-direction: column;">
        @foreach($games as $game)
            <div class="row"> <img style="width: 4vw; height: 4vw" src="
            @if(isset(Auth::user()->picture))
                    /images/users/{{Auth::user()->picture}}
                @else
                    /images/user-64.png
@endif
                    "><p>#{{$loop->index+1}} > {{ $users[$game->user_id]['name'] }}
                    Lvl.{{ $users[$game->user_id]['level'] }}</p>
                <label>{{$game->score}}</label><label>{{$game->difficulty}}</label>
                <button class="bluebutton">👁</button>
            </div>
        @endforeach
    </div>

</div>

</div>

<div class="popup" style="visibility: hidden;" id="options">
    <div class="close" onclick="DivToggle('options')"> x</div>
    <div class="sidebar">
        <div class="column"><a href="#" onclick="Showdiv('account')">Account</a>
            <a href="#" onclick="Showdiv('taal')">Taal</a>
            <a href="#" onclick="Showdiv('thema')">Thema</a></div>
    </div>
    <div id="popupcontent">
        <div id="account" style="display: flex"><h1> Account Settings</h1>
            <div class="bluebutton" style="margin: unset; width: max-content">Inloggen</div>
        </div>
        <div id="taal" style="display: none"><h1> Taal</h1>
            <label>Selecteer een taal:</label>
            <select>
                <option>🇳🇱 Nederlands</option>
                <option>🇬🇧 English</option>
            </select></div>
        <div id="thema" style="display: none"><h1> Thema</h1>
            <label>Selecteer een thema:</label>
            <div class="table">
                <div class="themeexample dark"> Donker</div>
                <div class="themeexample light"> Licht</div>
            </div>
        </div>
    </div>
</div>
</div>


</body>
</html>
