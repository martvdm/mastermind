@if(Auth::user()->power !== 'guest')
    <p class="admin">
{{Auth::user()->power}}
    </p>
@endif

