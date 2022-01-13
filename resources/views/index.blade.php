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
</head>
<body>
<div class="testcontainer">
    <a href="/mastermind/gameinput">
        <button class="bluebutton" style=" background: #e2e8f0; color: black">Testapps</button>
    </a>
    <button class="bluebutton" style="margin-bottom: 10%; background: #e2e8f0; color: black"
            onclick="DivToggle('leaderboard')">Leaderboard
    </button>
</div>
<div class="container">
    <div class="popup" id="leaderboard">
        <div class="top">
            <div class="close">🔍</div>
            <h1>Leaderboard</h1>
            <div onClick="DivToggle('leaderboard')" class="close">☓</div>
        </div>
        <input type="text" placeholder="Zoeken...">
        <div class="column">
            <div class="row"><p>🥇 Mart</p><label>{{rand(1,100000)}}</label>
                <button class="bluebutton">👁</button>
            </div>
            <div class="row"><p>🥈 Mart</p><label>{{rand(1,100000)}}</label>
                <button class="bluebutton">👁</button>
            </div>
            <div class="row"><p>🥉 Mart</p><label>{{rand(1,100000)}}</label>
                <button class="bluebutton">👁</button>
            </div>
            <div class="row"><p>🥉 Mart</p><label>{{rand(1,100000)}}</label>
                <button class="bluebutton">👁</button>
            </div>
            <div class="row"><p>🥉 Mart</p><label>{{rand(1,100000)}}</label>
                <button class="bluebutton">👁</button>
            </div>
            <div class="row"><p>🥉 Mart</p><label>{{rand(1,100000)}}</label>
                <button class="bluebutton">👁</button>
            </div>
            <div class="row"><p>🥉 Mart</p><label>{{rand(1,100000)}}</label>
                <button class="bluebutton">👁</button>
            </div>
            <div class="row"><p>🥉 Mart</p><label>{{rand(1,100000)}}</label>
                <button class="bluebutton">👁</button>
            </div>

        </div>

    </div>
</div>
</body>
</html>
