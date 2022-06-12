@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<div class="container align-items-center mx-auto">

    <div class="row row mb-4 justify-content-between align-items-center">
        <h4 class="col col-md-auto">{{ $data->name }}</h4>

    </div>
    <div class="row mb-4 justify-content-between">
        @if ($data->ClosingHours == $data->OpeningHours)
        <div class="col col-md-auto">Open From : {{ $data->OpeningDay }} to {{ $data->ClosingDay }} For 24 Hours</div>
        @else
        <div class="col col-md-auto">Open From : {{ $data->OpeningDay }} to {{ $data->ClosingDay }} At {{
            $data->OpeningHours }} to {{ $data->ClosingHours }}</div>
        @endif



    </div>
    <nav class="navbar navbar-expand-sm d-flex align-items-center navbar-light shadow-md mt-2">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav me-1 mb-2 mb-lg-0">
                @if (\Request::is('shop'))
                <li class="nav-item me-5" style="border-bottom:2px solid dodgerblue">

                    <a class="fw-bolder nav-link" href="/shop">Product</a>
                </li>
                @else
                <li class="nav-item me-4">

                    <a class="fw-bolder nav-link" href="/shop">Product</a>
                </li>
                @endif
                @if (\Request::is('shopinfo*'))
                <li class="nav-item ms-5" style="border-bottom:2px solid dodgerblue">
                    <a class="fw-bolder nav-link" href="/shopinfo/{{ $data->id }}">Shop Info</a>
                </li>
                @else
                <li class="nav-item ms-5">
                    <a class="fw-bolder nav-link" href="/shopinfo/{{ $data->id }}">Shop Info</a>
                </li>
                @endif

            </ul>

        </div>
    </nav>
    <div class="row justify-content-start mt-5">
      <h4>{{ $data->desc }}</h4>
    </div>

</div>

@endsection
