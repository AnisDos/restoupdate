@if (Auth::guard('web')->check())

<p style="color:green;">
    your are logged in as User
</p>

@else
<p style="color:red;">
    your are logged out  as User
</p>

@endif


@if (Auth::guard('employee')->check())

<p style="color:green;">
    your are logged in as employee
</p>

@else
<p style="color:red;">
    your are logged out  as employee
</p>

@endif