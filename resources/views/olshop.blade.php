@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<div class="container align-items-center mx-auto">
    @if ($shop==null)
    <div class="row mb-4">
        <h4 class="text-center">The Shop You are looking for does not exist</h4>
    </div>
    <div class="position-relative">
        <a href="/newshop" class="btn position-absolute start-50 translate-middle btn-outline-primary mx-auto">Open New
            Shop</a>
    </div>
    @else
    <div class="row row mb-4">
        <h4 class="col col-md-12">{{ $shop->name }}</h4>
        @if ($shop->ClosingHours == $shop->OpeningHours)
        <div class="col col-md-auto">Open From : {{ $shop->OpeningDay }} to {{ $shop->ClosingDay }} For 24 Hours</div>
        @else
        <div class="col col-md-auto">Open From : {{ $shop->OpeningDay }} to {{ $shop->ClosingDay }} At {{
            $shop->OpeningHours }} to {{ $shop->ClosingHours }}</div>
    </div>
    @endif
    <nav class="navbar navbar-expand-sm d-flex align-items-center navbar-light shadow-md mt-2">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav me-1 mb-2 mb-lg-0">
                @if (\Request::is('shop*'))
                <li class="nav-item me-5" style="border-bottom:2px solid dodgerblue">

                    <a class="fw-bolder nav-link" href="/shop/{{ $shop->id }}">Product</a>
                </li>
                @else
                <li class="nav-item me-4">

                    <a class="fw-bolder nav-link" href="/shop/{{ $shop->id }}">Product</a>
                </li>
                @endif
                @if (\Request::is('shopinfo*'))
                <li class="nav-item ms-5" style="border-bottom:2px solid dodgerbluw">
                    <a class="fw-bolder nav-link" href="/shopinfo/{{ $shop->id }}">Shop Info</a>
                </li>
                @else
                <li class="nav-item ms-5">
                    <a class="fw-bolder nav-link" href="/shopinfo/{{ $shop->id }}">Shop Info</a>
                </li>
                @endif

            </ul>

        </div>
    </nav>
    <div class="row justify-content-start mt-5">
        @if (count($data)==0)
        <h2 class="text-center mx-auto">There is No Product in Your Shop</h2>
        @else
        {{-- <h2 class="my-4">Recommendation For You</h2>--}}
        @foreach ($data as $item)
        <div class="col col-md-auto">
            <a href="/details/{{ $item->id }}" class="card shadow rounded text-decoration-none text-dark"
                >
                <img src="{{ Illuminate\Support\Facades\Storage::url($item->image) }}"
                    class="card-img-top justify-content-center" style="width:14rem;height:10rem" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text  fw-bold" style="color:#f5740b;">Rp.{{$item->price}}.-</p>

                </div>
            </a>
        </div>

        @endforeach
        @endif
    </div>
    <div class="d-flex justify-content-between mt-5">

        <div class="d-flex justify-content-start">Showing {{$data->firstItem()}} to
            {{$data->lastItem()}} of {{$data->total()}} results</div>
        <nav class="d-flex justify-content-end" aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for ( $i=1 ;$i <=$data->lastPage() ;$i++)
                    @if ($i == $data->currentPage())
                    <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
                    @else
                    <li class="page-item "><a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a></li>
                    @endif
                    @endfor

                    <li class="page-item">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
            </ul>
        </nav>

    </div>
</div>
@endif
@endsection
