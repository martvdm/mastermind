@extends('layouts.global')
@section('extracss') <link rel="stylesheet" type="text/css" href="/css/users/authpages.css">
<link rel="stylesheet" type="text/css" href="/css/global/global.css"> @endsection
@section('assets')
    <div class="logincard card" style="justify-content: center">
        <div class="top" style="width: min-content; display: flex; margin: auto; flex-direction: row"><a><h1>{{__('Register')}}</a>/<a style=" text-decoration: none;color: lightslategrey" href="{{route('login')}}">{{__('Login')}}</h1></a></div>
        @error('email')

        <strong>{{ $message }}</strong>

        @enderror
        @error('password')

        <strong>{{ $message }}</strong>

        @enderror<div class="columndirector" style="display: flex; margin: auto; width: min-content">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <label for="name">{{ __('Name') }}</label>


                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


                    <label for="email">{{ __('E-Mail Adres') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <label for="password">{{ __('Wachtwoord') }}</label>


                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">




                <button type="submit" style="margin-bottom: 4%">
                    {{ __('Register') }}
                </button>



            </form>
        </div>
    </div>
@endsection

