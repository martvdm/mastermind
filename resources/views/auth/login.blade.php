@extends('layouts.global')
@section('extracss') <link rel="stylesheet" type="text/css" href="/css/users/authpages.css">
<link rel="stylesheet" type="text/css" href="/css/global/global.css"> @endsection
@section('assets')
    <div class="logincard card">
        <div class="top"><h1>{{__('Login')}}</h1></div>
        @error('email')

        <strong>{{ $message }}</strong>

        @enderror
        @error('password')

        <strong>{{ $message }}</strong>

        @enderror
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                            <label for="email">{{ __('E-Mail Adres') }}</label>
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                        <label for="password">{{ __('Wachtwoord') }}</label>


                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">




                                <div class="rowdirector" style="height: min-content">

                                    <label for="remember" style="display: flex; width: max-content">
                                        {{ __('Onthoud mij') }} <br><input style="display: flex" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    </label>

                                </div>

                                <button type="submit">
                                    {{ __('Login') }}
                                </button>



                    </form>

@endsection
    </div>
