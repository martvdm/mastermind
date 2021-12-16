<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testen :)</title>
    <link rel="stylesheet" type="text/css" href="/css/apptest/structure.css">
</head>
<body>
{{-- Displays the secret gameID in blade--}}

@if(isset($victory) && $victory === true)
    <div class="victoryscreen">
        <img src="https://purepng.com/public/uploads/large/new-fortnite-victory-royale-aow.png">
        {{Session::forget('victory')}}
        <a href="/mastermind/gameinput">
        <button class="checkbutton" style="margin-top: 0px">Nog een keer</button>
        </a></div>
@endif
@if(isset($randomgameid))
<div class="secretcodecontainer colorselecter">
    {{$randomgameid[0] . $randomgameid[1] . $randomgameid[2] . $randomgameid[3]}}
    <label>Secret GameID:</label>
</div>
@endif

@if(!isset($selectedcolorid))
    <div>
        @elseif($selectedcolorid == 1)
            <div class="yellowcursor">
                @elseif($selectedcolorid == 2)
                    <div class="bluecursor">
                        @elseif($selectedcolorid == 3)
                            <div class="redcursor">
                                @elseif($selectedcolorid == 4)
                                    <div class="greencursor">
@endif

<div class="rowdirector">
    <div class="selectcontainer" style="margin-right: 5%">
        <form method="post">
            @csrf
            @for($i = 1; $i <= 4; $i++)
                <button name="selectedcolor" value="{{$i}}" type="submit" class="selectfield" id="_{{$i}}"></button>
            @endfor
        </form>

    </div>
@foreach($playboard as $stagerows)
        <div class="columndirector">
            <div class="checkbox" style="padding-bottom: 0px; padding-top: 0px">
                <p>Goed: {{$playboardcheck[$loop->index][2]}}</p>
                <p>?: {{$playboardcheck[$loop->index][1]}}</p>
                <p>Fout: {{$playboardcheck[$loop->index][0]}}</p>
            </div>

            <form method="post" name="setcellcolor">
                <input name="stageindex" type="hidden" value="{{$arrayindex = $loop->index}}">
                @csrf

        @foreach($stagerows as $cells)
                    <button id="_{{$cells}}" class="selectfield"  name="cellindex" value="{{$loop->index}}">
        @endforeach
            </form>
        </div>
@endforeach
{{--    <div class="columndirector">--}}
{{--    @foreach($randomgameid as $singlegameid)--}}
{{--        <div class="selectfield locked" id="_{{$singlegameid}}">--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--    </div>--}}

</div>
</div>
<a href="/check"> <button class="checkbutton" type="submit"> Check </button></a>
</body>
</html>
