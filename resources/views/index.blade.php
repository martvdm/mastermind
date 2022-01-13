<!doctype html>
<html lang="{{session()->get('lang')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/apptest/structure.css">
    <script type="text/javascript" src="/js/DivToggle.js"></script>
    <script type="text/javascript" src="/js/SearchBar.js"></script>
    <script type="text/javascript" src="/js/SettingMenu.js"></script>
</head>
<body>
<div class="testcontainer">
    <a href="/mastermind/gameinput">
        <button class="bluebutton" style=" background: #e2e8f0; color: black">Testapps</button>
    </a>
    <button class="bluebutton" style="margin-bottom: 10%; background: #e2e8f0; color: black"
            onclick="DivToggle('leaderboard')">Leaderboard
    </button>
    <button class="bluebutton" style="margin-bottom: 10%; background: #e2e8f0; color: black"
            onclick="DivToggle('options')">Instellingen
    </button>
</div>
<div class="container">
        <div class="popup" id="leaderboard" style="flex-direction: column">
            <div class="top">
                <div class="close">🔍</div>
                <h1>Leaderboard</h1>
                <div onclick="DivToggle('leaderboard')" class="close">☓</div>
            </div>
            <input type="text" id="searchbar" placeholder="Zoeken..." onkeyup="myFunction()">
            <div class="column" id="searcharea" style="flex-direction: column;">
                <div class="row"><a href="#"><p>🥇 Mart</p></a><label>{{rand(1,100000)}}</label>
                    <button class="bluebutton">👁</button>
                </div>
                <div class="row"><a href="#"><p>🥇 Tim</p></a><label>{{rand(1,100000)}}</label>
                    <button class="bluebutton">👁</button>
                </div>
                <div class="row"><a href="#"><p>🥇 Helina</p></a><label>{{rand(1,100000)}}</label>
                    <button class="bluebutton">👁</button>
                </div>
                <div class="row"><a href="#"><p>🥇 Jerrold</p></a><label>{{rand(1,100000)}}</label>
                    <button class="bluebutton">👁</button>
                </div>

            </div>

        </div>

    <div class="popup" id="options">
        <div class="close" onclick="DivToggle('options')"> x</div>
        <div class="sidebar">
            <div class="column"><a href="#" onclick="Showdiv('account')">Account</a>
                <a href="#" onclick="Showdiv('taal')">Taal</a>
                <a  href="#" onclick="Showdiv('thema')">Thema</a></div>
        </div>
        <div id="settingscontent">
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
                <label>Selecteer een thema:</label><div class="table">
                <div class="themeexample dark"> Donker </div>
                <div class="themeexample light"> Licht </div>
                </div>
            </div></div>
        </div>
    </div>
</div>

</body>
</html>
