@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<div class="container mt-4">
    <div class="row justify-content-center">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-interval="2000" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-interval="2000" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-interval="2000" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="{{ asset('image/carouselimage1.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/carouselimage2.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/carouselimage3.jpg') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
            </div>
            <h2 class="">Kategori</h2>
            <div class="row row-cols-5 mt-2 mb-5"style="width:60%">
                        @foreach ($category as $item)
                        <div class="col col md-auto">
                       <a href="/search/{{ $item->id }}"class="card shadow rounded text-decoration-none text-dark" style="width: 8rem;height:8rem;">
                           <img src="{{Storage::url($item->image)}}" class="card-img-top mx-auto mt-2"style="width:80%;height:50%;" alt="...">
                          <div class="card-body">
                           <p class="card-title text-center fw-bold" style="font-size:14px;">{{ $item->name }}</p>
                          </div>
                        </a>
                        </div>
                        @endforeach

            </div>
            <div class="row mt-5">
                @if ($data->total()==0)
                <h2 class="text-center mx-auto">The Product is not found</h2>
                @else
                {{-- <h2 class="my-4">Recommendation For You</h2> --}}
            @foreach ($data as $item)
            @if($item->stock>0)
            <div class="col col-md-auto">
                <a href="/details/{{ $item->id }}" class="card shadow rounded text-decoration-none text-dark" >
                    <img src="{{ Illuminate\Support\Facades\Storage::url($item->image) }}" class="card-img-top justify-content-center"
                    style="width:14rem;height:10rem" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text  fw-bold"style="color:#f5740b;">Rp.{{$item->price}}.-</p>
                    </div>
                </a>
            </div>
            @else
            <div class="col col-md-auto"style="opacity:50%">
                <a href="/details/{{ $item->id }}" class="card shadow rounded text-decoration-none text-dark"
                    style="width: 14rem;height:18rem;">
                    <img src="{{ Illuminate\Support\Facades\Storage::url($item->image) }}"
                        class="card-img-top justify-content-center" style="width:100%;height:10rem" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text my-auto fw-bold" style="color:#f5740b;">Rp.{{$item->price}}.-</p>
                        <div class="card-text text-color-success text-center mb-4"><span
                                class="position-absolute top-50 start-50 translate-middle badge bg-danger rounded-pill">Sold Out</div>
                    </div>
                </a>
            </div>
            @endif
            @endforeach
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
    @endif
</div>
@endsection

