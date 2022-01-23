@extends('layouts.profilelayout')
@section('titlebox'){{__('Admin - Roles')}}@endsection
@section('contentassets')


    <button class="actionbutton" onclick="DivToggle('createform')"> {{__('Create Role')}}</button>
    <div class="popup" style="visibility: hidden;" id="createform">

        <div class="close" onclick="DivToggle('createform')"> x</div>
        <input type="text">
    </div>
    <div class="card" style="justify-content: space-between; width: 100%">
        <h4>ID</h4>
        <h4>Role</h4>
        <h4>Priority</h4>
        <h4>Permissions</h4>
    </div>
    @foreach ($roles as $role)
        <div class="card" style="justify-content: space-between; width: 100%">
            <h4 style="margin-left: unset;">{{ $role->id }}</h4>
            <h4 class="role" style="background: {{ $role->hexcolor }}; margin-left: unset;">{{ $role->name }}</h4>
            <h4>{{ $role->priority }}</h4>
            <h4>{{ $role->permissions }}</h4>

        </div>
    @endforeach
@endsection
