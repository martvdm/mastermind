<link rel="stylesheet" type="text/css" href="/css/global/nav.css">
<script src="/js/DivToggle.js"></script>
<script src="/js/SettingMenu.js"></script>
<script src="/js/Nav.js"></script>

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
        }
    </style>
@endif

<nav>
    @if (!array_key_exists('sidebar', View::getSections()))
        <div class="header">
            <img src="/images/lock.png">
            <a href="/"> Barry <span>Boter</span>
            </a></div>@endif
    @guest
        @if (Route::has('login'))

            <a href="{{ route('login') }}"><p>{{ __('Login') }}</p></a>

        @endif


    @else
        <div class="column">
            <a onclick="DivToggle('dropdown')">
                <p class="username">
                    {{ Auth::user()->name }} ▼
                </p>
                <x-role-shower></x-role-shower>
                <img class="dropdownimg" src="
            @if(isset(Auth::user()->picture))
                    /uploads/pictures/{{Auth::user()->picture}}
                @else
                    /images/user-64.png
@endif
                    "></a>
            <div class="dropdown" id="dropdown" style="visibility: hidden">
                <a style="color: var(--color-outline)" href="/account/dashboard">
                    {{ __('Profiel') }}
                </a>
                <a style="color: var(--color-outline)" href="/account/settings">
                    {{ __('Instellingen') }}
                </a>
                <a style="color: red" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Uitloggen') }}
                </a>


            </div>
        </div>
        </li>
    @endguest
</nav>
@if (array_key_exists('sidebar', View::getSections()))
    <div class="sidebar">
        <a href="/" style="justify-content: center; padding-bottom: 7%;margin-bottom: 2%; border-bottom: 1px lightgrey solid;">Terug</a>
        <a href="/account/dashboard">{{__('profile')}}</a>
        <a href="/account/settings">{{__('settings')}}</a>
        <a href="/account/preferences">{{__('preferences')}}</a>
        @if(isset(Auth::user()->roles->id) && Auth::user()->roles->id == 2)
            <a style="margin-top: 10%; color: red; justify-content: center; padding-bottom: 7%;margin-bottom: 2%; border-bottom: 1px lightgrey solid;">Admin</a>
            <a style="color: red" href="/admin/users">{{__('User Management')}}</a>
            <a style="color: red" href="/admin/roles">{{__('Role Management')}}</a>@endif

        <a class="logout" href="{{ route('logout') }}"
           onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{__('logout')}}</a>

    </div>
@endif
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
