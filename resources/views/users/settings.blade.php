@extends('layouts.profilelayout')
@section('titlebox'){{__('settings')}}@endsection
@section('contentassets')
<div class="column">
<form>
    Email
    <input type="email" value="{{Auth::user()->email}}"><button>Save</button>
</form>
    <form action="post">
        Naam
        <input type="text" value="{{Auth::user()->name}}"><button>Save</button>
    </form>
</div>
@endsection