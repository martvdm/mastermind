@extends('layouts.global')

    @section('title') Mastermind @endsection
@section('extracss')
    <link rel="stylesheet" type="text/css" href="/css/mastermind/structure.css">
    @endsection
    @section('extrascript')
        <!-- tsParticles main script -->
    <script src="https://www.wpromotions.eu/confetti.min.js"></script>
    @endsection

@section('assets')
    <x-navigation></x-navigation>
{{-- Displays the secret gameID in blade--}}

@if(isset($victory) && $victory === true)


    <div class="victoryscreen">
        <script>confetti.start()</script>
        <h1> Je hebt de code geraden! </h1>
        <h1 style="font-size: 3vw">Score: {{ $endgamescore }}</h1>
        @if(Auth::user()->experience->level > $beforegamelevel)
        <h1 style="font-size: 2vw; color: #00dd83">Level {{$beforegamelevel}} > {{Auth::user()->experience->level}}</h1>
        @endif
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
        <div class="row">
        <a href="/mastermind/gameinput">
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
        <h1 style="font-size: 3vw">Score: {{ $endgamescore }}</h1>
        <h1>test</h1>
        <div class="rowdirector">
            <h1 style="font-size: 4vw">De code was: </h1>
            @foreach($randomgameid as $singlegameid)
                <div class="selectfield" style="padding:2vw; margin: auto; margin-inline: 2px" id="_{{$singlegameid}}"></div>
            @endforeach
        </div>

        <a href="/mastermind/gameinput">
            <button class="checkbutton" style="margin-top: 0px">Nog een keer</button>
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

<div class="rowdirector" style="margin-top: 2%">
    <div class="selectcontainer" style="margin-right: 5%">
        <form method="post">
            @csrf
            @for($i = 1; $i <= 4; $i++)
                <button name="selectedcolor" value="{{$i}}" type="submit" class="selectfield" id="_{{$i}}"></button>
            @endfor
        </form>

    </div>
@foreach($playboard as $stagerows)
    @if($loop->index === $currentstageindex)
        <div class="columndirector" style="border: 1px red solid">
            @else
                <div class="columndirector">
            @endif
            <div class="checkbox" style="padding-bottom: 0px; padding-top: 0px">
                <p style="color: lightgreen">✔: {{$playboardcheck[$loop->index][2]}}</p>
                <p style="color: orange">?: {{$playboardcheck[$loop->index][1]}}</p>
                <p style="color: red">❌: {{$playboardcheck[$loop->index][0]}}</p>
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
@endsection
