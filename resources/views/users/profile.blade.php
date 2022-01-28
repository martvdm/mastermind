@extends('layouts.profilelayout')
@section('titlebox'){{__('profile')}}@endsection
@section('contentassets')
            <a href="/account/settings">
        <div class="card" style="width: 100%">
            <img style="width: 4vw; height: 4vw" src="
            @if(isset(Auth::user()->picture))
                /images/users/{{Auth::user()->picture}}
            @else
                /images/user-64.png
@endif
                ">
            <div class="profilecardtext">
                <h2>Welkom, {{Auth::user()->name}}</h2><x-role-shower></x-role-shower>
                <p>{{Auth::user()->email}}</p>
            </div>

{{--            <img src="/images/edit.png">--}}
        </div>
                <div class="card" style="width: 100%">

                        <h2 style="margin-right: 2%">Level {{Auth::user()->experience->level}}</h2>
                        <p>{{Auth::user()->experience->experience}}/{{Auth::user()->experience->levellist->experience}}</p>
                     </div>
        </a>
    </div>

@endsection
