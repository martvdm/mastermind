@if(isset(Auth::user()->role_id) && Auth::user()->role_id != 1)
    <label style="background: {{Auth::user()->roles->hexcolor}}" class="role">
        {{ Auth::user()->roles->name }}
    </label>
@endif

