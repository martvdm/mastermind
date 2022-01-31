@extends('layouts.profilelayout')
@section('titlebox'){{__('settings')}}@endsection
@section('contentassets')
<div class="column">

        <div class="card">
            <form enctype="multipart/form-data" method="post" action="/saveprofilepicture">
                @csrf
                <div style="width: 6rem; height:  6rem; display: flex; flex-direction: column" onclick="document.getElementById('pictureinput').click();">
                <img src="
            @if(isset(Auth::user()->picture))
                    /uploads/pictures/{{Auth::user()->picture}}
                @else
                    /images/user-64.png
@endif
                    "  onmouseenter="DivToggle('imageinput')">
                    <div id="imageinput" style="visibility: hidden" onmouseleave="DivToggle('imageinput')">Upload Image</div>
        <input id="pictureinput" type="file" name="picture" onchange="this.form.submit()" hidden>

                </div>
                <a href="#" onclick="document.getElementById('pictureinput').click();">Select Image</a>
            </form>
        </div>


    <form method="post">
        @csrf
    Email
    <input type="email" name="email" value="{{Auth::user()->email}}">


        Naam
        <input type="text" name="name" value="{{Auth::user()->name}}">
        Nieuw Wachtwoord
        <input type="password" name="password" autocomplete="off">
        Wachtwoord Confirm
        <input type="password" name="password_confirmation">
    <button type="submit">Save</button>
    </form>


@endsection
