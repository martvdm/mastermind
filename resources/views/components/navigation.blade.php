<link rel="stylesheet" type="text/css" href="/css/global/nav.css">
<script src="/js/DivToggle.js"></script>

<nav>
    <a href="/"> <
    </a>
    @guest
        @if (Route::has('login'))

            <a href="{{ route('login') }}">{{ __('Login') }}</a>

        @endif


    @else
<div class="column">
        <a  onclick="DivToggle('dropdown')">
            <img class="dropdownimg" src="/images/user-64.png"> {{ Auth::user()->name }}
            </a>
            <div class="dropdown" id="dropdown" style="visibility: hidden">
                <a style="color: darkslategray" href="/home" >
                    {{ __('Profiel') }}
                </a>
                <a style="color: darkslategray" href="/instellingen" >
                    {{ __('Instellingen') }}
                </a>
                <a style="color: darkred" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  {{ __('Loguit') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div></div>
        </li>
    @endguest
</nav>
