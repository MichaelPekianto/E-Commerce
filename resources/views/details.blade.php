<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>{{$data->name}}</title>
</head>

<body>
    @extends('layouts.app')
    @section('content')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <div class="container-fluid bg-white d-flex flex-column justify-content-center py-5">


        <div class="container bg-dark text-white rounded-3 mt-4 mx-auto">
            <div class="row justify-content-between my-4 mx-4">
                <div class="col col-md-auto me-4">
                       <img src="{{ Storage::url($data->image) }}" style="width:450px;height:450px;"alt=""></div>
                <div class="col d-flex flex-column">
                    <h4 class=" fw-bolder mb-4">{{ $data->name }}</h4>
                    <p class="desc txt text-left text-wrap mb-4">{{ $data->desc }}</p>
                   <h4 class=" fw-bolder mb-4">Rp.{{ $data->price }},-</h4>
                   <div class="d-flex align-items-center mt-5">
                       {{-- <div class="d-flex txt me-5">
                        <h5 class="me-5">Kuantitas</h5>
                    <button class="btn btn-light" id='minus'>-</button>
                    <input class="text-center" type="text" aria-valuenow="1" value="1">
                    <button class="btn btn-light" id='plus'>+</button>
                    </div> --}}
                    @if (auth()->check()!=false)
                    <form class="row d-flex" action="/cart/{{ $data->id }}" method="POST">
                        @csrf
                            <label for="quantity" class="col-sm-2 col-form-label txt">Kuantitas</label>
                            <div class="col-sm-8 d-flex mx-auto">
                            <button class="btn btn-primary border-primary text-white text-center fw-bold" id='minus' type="button" style="height:35px;">-</button>
                            <input id="quantity"name="quantity"class="text-center border-white" type="value"  value="1"style="width:50px;height:35px">
                            <button class="btn btn-primary border-primary text-white text-center" id='plus' type="button"style="height: 35px;">+</button>
                            <p id="stock" class="txt mx-auto mt-2"data-field-id="{{ $data->stock }}">tersisa {{ $data->stock }}</p>
                        </div>

                        <a href="/shop/{{ $data->getShop->id }}"class="col-sm-10 text-white text-decoration-none mt-4"><h4>{{ $data->getShop->name }}</h4></a>

                        <button type="submit" class="col-sm-4 justify-content-end mt-5 btn btn-primary" >Add to Cart</button>
                    </form>
                    @else
                    <form class="row d-flex" action="/login" method="GET">
                        @csrf
                            <label for="quantity" class="col-sm-2 col-form-label txt">Kuantitas</label>
                            <div class="col-sm-8 d-flex mx-auto">
                            <button class="btn btn-primary border-primary text-white text-center fw-bold" id='minus' type="button" style="height:35px;">-</button>
                            <input id="quantity"name="quantity"class="text-center border-white" type="value"  value="1"style="width:50px;height:35px">
                            <button class="btn btn-primary border-primary text-white text-center" id='plus' type="button"style="height: 35px;">+</button>
                            <p id="stock" class="txt mx-auto mt-2"data-field-id="{{ $data->stock }}">tersisa {{ $data->stock }}</p>
                        </div>

                        <a href="/shop/{{ $data->getShop->id }}"class="col-sm-10 text-white text-decoration-none mt-4"><h4>{{ $data->getShop->name }}</h4></a>

                        <button type="submit" class="col-sm-4 justify-content-end mt-5 btn btn-primary" >Add to Cart</button>
                    </form>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    var count = 1;
        var minus = document.getElementById("minus");
        var plus = document.getElementById("plus");
        var disp = document.getElementById("quantity");
        var stock ={!! json_encode($data->stock, JSON_HEX_TAG) !!};
    minus.onclick = function(){
        if(count>0){
        count--;
        disp.value=count;
        }
    }
        plus.onclick = function () {
            if(count<stock){
            count++;
            disp.value = count;
            }
        }
</script>
    @endsection
</body>

</html>
