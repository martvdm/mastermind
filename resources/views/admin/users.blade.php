@extends('layouts.profilelayout')
@section('titlebox'){{__('Admin - Users')}}@endsection
@section('contentassets')
    <button class="actionbutton" onclick="DivToggle('createform')"> {{__('Create User')}}</button>
    <div class="popup" style="visibility: hidden;" id="createform">

        <div class="close" onclick="DivToggle('createform')"> x</div>
        <input type="text">
    </div>
    <div class="card" style="justify-content: space-between; width: 100%">
        <h4>ID</h4>
        <h4>Name</h4>
        <h4>Email</h4>
        <h4>Role</h4>
    </div>
    @foreach ($users as $user)
        <div class="card" style="justify-content: space-between; width: 100%">
            <h4 style="margin-left: unset;">{{ $user->id }}</h4>
            <h4 style="margin-left: unset;">{{ $user->name }}</h4>
            <h4>{{ $user->email }}</h4>
            @isset($user->role_id)
                <h4 class="role" style="color: {{ $user->roles->hexcolor }}">{{ $user->roles->name }}</h4>
            @else
            <h4>{{ $user->role_id }}</h4>
            @endisset
        </div>
    @endforeach
@endsection
