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

        @if(session('message') == 'gameexistalert')
            <div class="popup" id="popup"
                 style="width: max-content; height: max-content; padding-bottom: 2%; margin: auto;visibility: visible; flex-direction: column">
                <div class="top">
                    <p style=" padding-inline: 1rem"></p>
                    <h2 style="color: red;">{{__('Waarschuwing!')}}</h2>
                    <div onclick="DivToggle('popup')" class="close" style="padding: 0.1rem"><p
                            onclick="DivToggle('gameselector')">☓</p></div>
                </div>
                <p style="margin-inline: auto; margin-top: 3%; margin-bottom: 3%">Er is nog een game bezig! </p>
                @if(Session::get('difficulty') == 'easy')
                    <label style="color: green; width: max-content; margin-inline: auto; display: flex; font-weight: bold"
                           class="difficulty">{{__('Makkelijk')}}</label>
                @elseif(Session::get('difficulty') == 'normal')
                    <label style="color: var(--primary-color); width: max-content; margin-inline: auto; display: flex;font-weight: bold"
                           class="difficulty">{{__('Normaal')}}</label>
                @elseif(Session::get('difficulty') ==  'hard')
                    <label style="color: red; width: max-content; margin-inline: auto; display: flex; font-weight: bold"
                           class="difficulty">{{__('Moeilijk')}}</label>
                @endif
                <div class="rowdirector"><a href="/mastermind/reset">
                        <button style="background: #c43535">Verwijderen</button>
                    </a>
                    <a href="/mastermind/gameinput">
                    <button>Verder gaan</button>
                    </a>
                </div>
            </div>
        @else
            <div class="succesalert" id="alert">{{session('message')}}</div>
        @endif
    @endif
@endif
