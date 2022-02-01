@extends('layouts.profilelayout')
@section('titlebox'){{__('settings')}}@endsection
@section('contentassets')
  
    <div class="columndirector">
@if($errors->any())
            <div class="erroralert" id="alert">
                <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
            @endforeach
                </ul>
            </div>
        @else
        @if(session('message'))
            <div class="succesalert" id="alert">{{session('message')}}</div>
        @endif
        @endif
        <div class="rowdirector" style="width: 100%">
            <div class="card" style="width: 25%;">
                <div class="rowdirector" style="width: 100%; display: flex; ">
                    <div class="columndirector" style="width: auto; display: flex; margin: auto">
                        <h2>Profiel Foto</h2>
                        <form enctype="multipart/form-data" method="post" action="/saveassets">
                            @csrf
                            <div style="width: 6rem; height:  6rem; display: flex; flex-direction: column"
                                 onclick="document.getElementById('pictureinput').click();">
                                <img src="
            @if(isset(Auth::user()->picture))
                                    /uploads/pictures/{{Auth::user()->picture}}
                                @else
                                    /images/user-64.png
@endif
                                    " onmouseenter="DivToggle('imageinput')">
                                <div id="imageinput" style="visibility: hidden" onmouseleave="DivToggle('imageinput')">
                                    Upload Image
                                </div>
                                <input id="pictureinput" type="file" name="picture" onchange="this.form.submit()"
                                       hidden>

                            </div>
                            <a href="#" onclick="document.getElementById('pictureinput').click();">Select Image</a>

                        </form>

                    </div>


                </div>

            </div>

            <div class="card" style="width: 100%">
                <div class="rowdirector" style="width: 100%">
                    <div class="columndirector" style="width: 100%;">
                        <h2 style="display: flex; margin-inline: auto">Account Instellingen</h2>
                        <form method="post">
                            @csrf
                            <div class="rowdirector"
                                 style="margin: 2%;justify-content: space-between; align-content: flex-start">
                                <label>Name</label>
                                <input type="text" name="name" value="{{Auth::user()->name}}">
                                <label>Email</label>
                                <input type="email" name="email" value="{{Auth::user()->email}}">

                            </div>
                            <div class="rowdirector"
                                 style="margin: 2%;justify-content: space-between; align-content: flex-start">
                                <label>Huidig Wachtwoord</label>
                                <input type="password" name="current_password">
                                <label>Nieuw Wachtwoord</label>
                                <input type="password" name="password" autocomplete="off">


                            </div>
                            <input  type="submit" id="form" hidden onclick="this.form.submit()">
                        </form>
                        <button style="align-self: flex-end" type="submit" onclick="document.getElementById('form').click();">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
