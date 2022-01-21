@extends('layouts.profilelayout')
@section('titlebox'){{__('Admin')}}@endsection
@section('contentassets')
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
            @if($user->power !== 'guest')
                <h4 class="admin">{{ $user->power }}</h4>
            @else
            <h4>{{ $user->power }}</h4>
            @endif
        </div>
    @endforeach
@endsection
