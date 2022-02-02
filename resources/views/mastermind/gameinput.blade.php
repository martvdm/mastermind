@extends('layouts.global')

    @section('title') Mastermind @endsection
@section('extracss')
    <link rel="stylesheet" type="text/css" href="/css/mastermind/structure.css">
    <link rel="stylesheet" type="text/css" href="/css/global/global.css">
    @endsection
    @section('extrascript')
        <!-- tsParticles main script -->
    <script src="https://www.wpromotions.eu/confetti.min.js"></script>
    @endsection

@section('assets')
    @extends('components.navigation')
{{-- Displays the secret gameID in blade--}}

@if(isset($victory) && $victory === true)


    <div class="victoryscreen">
        <script>confetti.start()</script>
        <h1> Je hebt de code geraden! </h1>
        <h1 style="font-size: 3vw">Score: {{ $endgamescore }}</h1>

            <div class="rowdirector">
                <h1 style="font-size: 4vw">De code was: </h1>
            @foreach($randomgameid as $singlegameid)
                 <div class="selectfield" style="padding:2vw; margin: auto; margin-inline: 2px" id="_{{$singlegameid}}"></div>
            @endforeach
            </div>
        {{Session::forget('victory')}}
        {{Session::forget('randomgameid')}}
        {{Session::forget('endgamescore')}}
        {{Session::forget('currentstageindex')}}
        {{Session::forget('beforegamelevel')}}
        {{Session::forget('playboard')}}
        {{Session::forget('playboardcheck')}}
        <div class="row">
        <a href="/mastermind/reset">
        <button class="checkbutton" style="margin-top: 0px">Reset</button>

        </a>

        <a href="/">
            <button class="checkbutton" style="margin-top: 0px">Home</button>
        </a>
    </div></div>
@endif
@if(isset($lost) && $lost === true)
    <div class="victoryscreen">
        <h1> Je hebt de code niet geraden! </h1>
        {{Session::forget('lost')}}
        {{Session::forget('randomgameid')}}
        {{Session::forget('endgamescore')}}
        {{Session::forget('currentstageindex')}}
        {{Session::forget('beforegamelevel')}}
        {{Session::forget('playboard')}}
        {{Session::forget('playboardcheck')}}
        <h1 style="font-size: 3vw">Score: {{ $endgamescore }}</h1>
        <h1>test</h1>
        <div class="rowdirector">
            <h1 style="font-size: 4vw">De code was: </h1>
            @foreach($randomgameid as $singlegameid)
                <div class="selectfield" style="padding:2vw; margin: auto; margin-inline: 2px" id="_{{$singlegameid}}"></div>
            @endforeach
        </div>

        <a href="/mastermind/gameinput">
            <button style="margin-top: 0px">Nog een keer</button>
        </a></div>
@endif

@if(isset($randomgameid) && Auth::user()->roles->id == 2)
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

<div class="columndirector playboard" style="padding-inline: 1%;flex-direction: column-reverse;">
    <div class="columndirector" style="margin-right: 5%">
        <form method="post">

            @csrf
            <div class="selectcontainer">
            @for($i = 1; $i <= Session::get('maxcolorid'); $i++)
                <button class="selectfield" name="selectedcolor" value="{{$i}}" id="_{{$i}}"></button>
            @endfor
            </div>
        </form>

    </div>
    <a href="/check"> <input class="checkbutton" type="submit" value="Check"> </a>
@foreach($playboard as $stagerows)
    @if($loop->index === $currentstageindex)
        <div class="rowdirector" style=" width: max-content; border: 0.2rem red solid; border-right: none">
            @else
                <div class="rowdirector" style="width: max-content;">
            @endif
{{--            <div class="checkbox rowdirector" style="padding-bottom: 0px; padding-top: 0px">--}}
                <div class="selectfield" style="padding: 0px; margin-right: 2vw">
                    @for($i = 0; $i < $playboardcheck[$loop->index][2]; $i++)
                        <div class="check" style="background: green"> </div>
                    @endfor
                        @for($i = 0; $i < $playboardcheck[$loop->index][1]; $i++)
                            <div class="check" style="background: orange"> </div>
                        @endfor
                        @for($i = 0; $i < $playboardcheck[$loop->index][0]; $i++)
                            <div class="check" style="background: red"> </div>
                        @endfor
                </div>
{{--                <p style="color: lightgreen">✔: {{$playboardcheck[$loop->index][2]}}</p>--}}
{{--                <p style="color: orange">?: {{$playboardcheck[$loop->index][1]}}</p>--}}
{{--                <p style="color: red">❌: {{$playboardcheck[$loop->index][0]}}</p>--}}
{{--            </div>--}}


            <form method="post" name="setcellcolor">
                <input name="stageindex" type="hidden" value="{{$arrayindex = $loop->index}}">
                @csrf
                <div class="rowdirector">
        @foreach($stagerows as $cells)
                    <button id="_{{$cells}}" class="selectfield"  name="cellindex" value="{{$loop->index}}">
        @endforeach
                </div>
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
@endsection
