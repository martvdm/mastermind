@if(isset(Auth::user()->role_id))
    <label style="background: {{Auth::user()->roles->hexcolor}}" class="role">
        {{ Auth::user()->roles->name }}
    </label>
@endif

