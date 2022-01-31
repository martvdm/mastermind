@extends('layouts.profilelayout')
@section('titlebox'){{__('profile')}}@endsection
@section('contentassets')
    <a href="/account/settings">
        <div class="card" style="width: 100%">
            <img style="width: 4vw; height: 4vw" src="
            @if(isset(Auth::user()->picture))
                /uploads/pictures/{{Auth::user()->picture}}
            @else
                /images/user-64.png
@endif
                ">
            <div class="profilecardtext">
                <h2>Welkom, {{Auth::user()->name}}</h2>
                <x-role-shower></x-role-shower>
                <p>{{Auth::user()->email}}</p>
            </div>

            {{--            <img src="/images/edit.png">--}}
        </div>
    </a>
    <div class="card" style="width: 100%; margin-top: 4%; flex-direction: column">

        <h2 style="margin-right: 2%">Level {{Auth::user()->experience->level}}</h2>
        <p>{{$user_experience}}/{{$user_neededexperience}}</p>
        <div class="leveldiagram">
            <div class="userprogress" style="animation: fadeInWidth 1s; width: {{$user_progress}}%"></div>
            <p>{{$user_progress}}%</p>
            <div class="neededexperience" style=" width: {{100-$user_progress}}%;"></div>

        </div>

    </div>

@endsection
