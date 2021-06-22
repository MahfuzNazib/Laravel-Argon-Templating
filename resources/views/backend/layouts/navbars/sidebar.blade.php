<style>
    .active-link-text{
        color: #f4645f;
        font-weight: 600
    }
</style>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('dashboard') }}">
            <img src="{{ asset('argon') }}/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('do.logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation Start-->
            <ul class="navbar-nav">
                {{-- Dashboard Link Start --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        @if (Route::currentRouteName() == 'dashboard')
                            <i class="ni ni-tv-2 text-primary"></i> 
                            <span class="nav-link-text active-link-text"> {{ __('Dashboard') }} </span>
                        @else
                            <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                        @endif
                    </a>
                </li>
                {{-- Dashboard Link End --}}

                <!-- Check User for Permission the routes Start -->
                <!-- For Admin Start -->
                @if (auth('super_admin')->check())
                    @foreach ( App\Models\Module::orderBy('position', 'asc')->get() as $module)
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#navbar-examples-{{ $module->position }}" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <i class="{{ $module->icon }} text-primary"></i>
                            <span class="nav-link-text">{{ $module->name }}</span>
                        </a>
    
                        <div class="collapse" id="navbar-examples-{{ $module->position }}">
                            <ul class="nav nav-sm flex-column">
                                @foreach ($module->sub_module->sortBy('position', false) as $sub_module)
                                    @if (Route::currentRouteName() == route($sub_module->route))
                                    <li class="nav-item">
                                        <a class="nav-link active-link-text" href="{{ route($sub_module->route) }}">
                                            {{ $sub_module->name }}
                                        </a>
                                    </li>

                                    @else

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route($sub_module->route) }}">
                                            {{ $sub_module->name }}
                                        </a>
                                    </li>

                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @endforeach
                <!-- For Admin End -->

                <!-- For Users Start -->
                @elseif(auth('web')->check())
                    @foreach ( App\Models\Module::orderBy('position', 'asc')->get() as $module)
                    @if(can($module->key))
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#navbar-examples-{{ $module->position }}" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <i class="{{ $module->icon }} text-primary"></i>
                            <span class="nav-link-text">{{ $module->name }}</span>
                        </a>
    
                        <div class="collapse" id="navbar-examples-{{ $module->position }}">
                            <ul class="nav nav-sm flex-column">
                                @foreach ($module->sub_module->sortBy('position', false) as $sub_module)
                                    @if(can($sub_module->key))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route($sub_module->route) }}">
                                            {{ $sub_module->name }}
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @endif
                    @endforeach
                @endif
                <!-- For Users End -->

                <!-- Check User for Permission the routes End -->
                
            </ul>
        </div>
    </div>
</nav>
