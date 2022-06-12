@extends('layouts.app')

@section('content')
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
{{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" /> --}}

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="mt-2 fw-bold text-3xl text-center">
                {{ 'Store' }}<span class="fw-bold text-primary">Ku</span>
            </div>
            {{-- <img class="mx-auto h-12 w-auto" src={{asset('')}} alt=""> --}}
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Sign Up your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Or
                <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Already have an account?
                </a>
            </p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mt-3">
                    <label for="name" class="">Name</label>
                    <input id="name" name="name" type="name" value="{{ old('name') }}" autocomplete="name"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="email" class="">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror ">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password" class="">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <p class="my-4">Gender</p>
                    <input type="radio" name="gender" value="Male" class=" @error('gender') is-invalid @enderror"
                        id="Male">
                    <label for="Male" class="">Male</label>
                    <input type="radio" name="gender" value="Female" class="ms-4  @error('gender') is-invalid @enderror"
                        id="Female">
                    <label for="Female" class="">Female</label>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                    Sign Up
                </button>
            </div>
            {{-- <div class="mt-2 text-sm text-red-700">
                @foreach($errors->all() as $e)
                <ul class="list-disc pl-5 space-y-1">
                    {{$e}}
                </ul>
                @endforeach
            </div> --}}
        </form>
    </div>
</div>
@endsection
