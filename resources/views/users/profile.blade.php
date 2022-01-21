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
        </div>
        </a>
    </div>

@endsection
