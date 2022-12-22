@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="container-xxl m-auto d-flex justify-content-center">
        <div class="row text authentication-wrapper authentication-basic container-p-y w-px-600">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2 pb-2">
                              <span class="app-brand-logo demo">
                                    <img src="{{ asset('assets/img/banner/Logo.png') }}" width="90px"/>
                              </span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input
                                    id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"
                                />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">{{ __('Password') }}</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                        required autocomplete="new-password">
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label"
                                           for="password-confirm">{{ __('Confirm Password') }}</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        id="password-confirm" type="password"
                                        name="password_confirmation" required autocomplete="new-password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                    >
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-primary" type="submit"> {{ __('Register') }}</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Already have Account?</span>
                            <a href="{{ route('login') }}">
                                <span>Login</span>
                            </a>
                        </p>

                        <div class="sign-up-accounts auth">
                            <div class="divider divider-primary">
                                <div class="divider-text"><h6>Or Login with</h6></div>
                            </div>
                            <div class="social-accounts d-flex justify-content-center">
                                <a href="#" title="Facebook"><i class='bx bxl-facebook'></i></a>
                                <a href="#" title="Instagram"><i class='bx bxl-instagram'></i></a>
                                <a href="{{ url('/auth/redirect/google') }}" title="Google"><i class='bx bxl-google'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
