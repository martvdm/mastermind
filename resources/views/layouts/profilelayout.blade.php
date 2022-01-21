@extends('layouts.global')
@section('extracss')
    <link rel="stylesheet" type="text/css" href="/css/users/profile.css">@endsection
@section('title') @yield('titlebox') @endsection
@section('assets')
    @extends('components.navigation')
@section('sidebar')@endsection
@section('assets')
    <div class="contentbox" id="settings">


        <div class="header">
            <h1>@yield('titlebox')</h1>
        </div>
@yield('contentassets')




@endsection
