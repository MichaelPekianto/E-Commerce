@extends('layouts.app')

@section('content')
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="{{asset('css/profile.css')  }}">
<link rel="stylesheet" href="{{asset('css/manage.css')  }}">
<div class="container">
    <div class=" d-flex justify-content-center">
        <div class="">
            <div class="mt-2 mb-4 fw-bold fs-2 text-center">
                {{ 'Store' }}<span class="fw-bold text-primary">Ku</span>
            </div>
            <div class="">
                <h3 class="mb-4 text-center fw-bold">{{ __('Sign In to Your Account') }}</h3>

                <div class="mt-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class=>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class=" justify-content-center">
                            <button type="submit" class="submitlogin form-control text-white">
                                {{ __('Sign In') }}
                            </button>

                            {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif --}}
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
