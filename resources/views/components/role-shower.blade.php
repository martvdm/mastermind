@if(isset(Auth::user()->role_id))
    <p style="background: {{Auth::user()->roles->hexcolor}}" class="role">
        {{ Auth::user()->roles->name }}
    </p>
@endif

