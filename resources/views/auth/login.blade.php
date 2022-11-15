@extends('layouts.auth')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-basic px-2">
                <div class="auth-inner my-2">
                    <!-- Login basic -->
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="/" class="brand-logo">
                                <img src="img/Logobpn.png" width="50" margin="10" alt="">
                                <h2 class="brand-text text-primary mt-1">&ensp;BPN KOTA BOGOR</h2>
                            </a>

                            <h4 class="card-title mb-1">Selamat Datang di SIMDAPEN! 👋</h4>
                            <p class="card-text mb-2">Silahkan masuk untuk memulai sistem</p>

                            <form class="auth-login-form mt-2" action="{{ route('login') }}" method="POST">
                                @csrf

                                <div class="mb-1">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" 
                                    id="email" placeholder="john@example.com" aria-describedby="email" tabindex="1" autofocus required autocomplete="email"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">{{ __('Kata sandi') }}</label>
                                        <a href="auth-forgot-password-basic.html">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" class="form-control form-control-merge @error('password') is-invalid @enderror"
                                        id="password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"
                                        required autocomplete="current-password"/>
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" tabindex="4">{{ __('Masuk') }}</button>
                            </form>
                            <p class="text-center mt-2"><span>{{ __('Belum punya akun?') }}</span><a
                                href="{{ route('register') }}"><span>&nbsp;{{ __('Buat akun') }}</span></a>
                            </p>
                        </div>
                    </div>
                    <!-- /Login basic -->
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
