<link rel="stylesheet" type="text/css" href="/css/global/nav.css">
<script src="/js/DivToggle.js"></script>

@if (array_key_exists('sidebar', View::getSections()))
    <style> .header a {
            color: var(--color-content);
            margin: 0;
        }
        .header img {
            height: 10%;
        }
        nav {
            justify-content: end;
            width: 87vw;
            right: 0;
            position: absolute;
        }</style>
@endif

<nav>
    @if (!array_key_exists('sidebar', View::getSections()))
   <div class="header">
       <img src="/images/lock.png">
       <a href="/"> Barry <span>Boter</span>
    </a></div>@endif
    @guest
        @if (Route::has('login'))

            <a href="{{ route('login') }}">{{ __('Login') }}</a>

        @endif


    @else
<div class="column">
        <a onclick="DivToggle('dropdown')">
            <img class="dropdownimg" src="
            @if(isset(Auth::user()->picture))
                /images/users/{{Auth::user()->picture}}
            @else
                /images/user-64.png
                @endif
            "> {{ Auth::user()->name }}
            </a>
            <div class="dropdown" id="dropdown" style="visibility: hidden">
                <a style="color: var(--color-outline)" href="/profile" >
                    {{ __('Profiel') }}
                </a>
                <a style="color: var(--color-outline)" href="/instellingen" >
                    {{ __('Instellingen') }}
                </a>
                <a style="color: red" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Uitloggen') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div></div>
        </li>
    @endguest
</nav>
@if (array_key_exists('sidebar', View::getSections()))
    <div class="sidebar">
        <a href="/" style="justify-content: center" >Terug</a>
        <div class="header">
            <a href="/">
            <img src="/images/lock.png">
             Barry <span>Boter</span>
            </a></div>
    </div>
@endif
