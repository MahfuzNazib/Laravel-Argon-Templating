@extends('backend.layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('backend.layouts.headers.guest')

    <div class="container mt--8">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    {{-- <div class="card-header bg-transparent pb-5"> --}}
                        {{-- <div class="text-muted text-center mt-2 mb-3"><small>{{ __('Sign in with') }}</small></div>
                        <div class="btn-wrapper text-center">
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div> --}}
                    {{-- </div> --}}
                    <div>
                        <center>
                            <img src="{{ asset('/argon/img/brand/logo2.svg') }}" class="image--cover">
                        </center>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" method="post" action="{{ route('do.login') }}">
                            <div class="text-muted text-center mt-2 mb-3"><large>{{ __('Sign in') }}</large></div>
                            @csrf
                            {{-- Invalid Message Show --}}
                            @if(session('message'))
                            <div class="form-group mb-3">
                                <div class="alert alert-danger">
                                    <center>
                                        {{ session('message') }}
                                    </center>
                                </div>
                            </div>
                            @endif
                            {{-- End Invalid Message --}}
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" name="password" placeholder="{{ __('Password') }}" type="password"  required>
                                </div>
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" name="remember" value="1" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="customCheckLogin">
                                    <span class="text-muted">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">{{ __('Sign in') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-light">
                                <small>{{ __('Forgot password?') }}</small>
                            </a>
                        @endif
                    </div>
                    <div class="col-6 text-right">
                        <a href="#" class="text-light">
                            <small>{{ __('Create new account') }}</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

