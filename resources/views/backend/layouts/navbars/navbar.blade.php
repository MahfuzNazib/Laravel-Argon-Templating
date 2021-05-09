@if (auth('super_admin')->check() || auth('web')->check())
    @include('backend.layouts.navbars.navs.auth')
@else
    @include('backend.layouts.navbars.navs.guest')
@endif