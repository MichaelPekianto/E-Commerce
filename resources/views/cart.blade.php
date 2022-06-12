@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/manage.css">
<div class="container ">
    <a class='d-flex justify-content-end me-5 pe-5 text-decoration-none' href="/transaction"><button type="button" class="btn-primary btn text-white fw-bolder">Checkout</button></a>
    <div class="d-flex justify-content-center mt-4">
        <table class="table table-hover mx-auto justify-content-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col text-white" >Product Name</th>
                    <th scope="col text-white" >Product Price</th>
                    <th scope="col text-white" >Product Quantity</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $item )

                <tr class='productrow'>
                    <th scope="row">
                        <img class="mx-3" style="border-radius: 100%;width:40px;height: 40px;" src=" {{ Illuminate\Support\Facades\Storage::url($item->getProducts->image) }}">
                        {{ $item->getProducts->name }}
                    </th>
                    <td>{{ $item->getProducts->price }}</td>
                    <form method="POST" action="/updatecart/{{ $item->id}}">
                        @csrf
                        <td><button class="btn btn-primary border-primary text-white text-center fw-bold" id='minus' type="button"
                            style="height:35px;">-</button>
                        <input name="quantity" id="quantity" class="text-center border-white" type="value" value="{{ $item->quantity }}"
                            style="width:50px;height:35px">
                        <button class="btn btn-primary border-primary text-white text-center" id='plus' type="button"
                            style="height: 35px;">+</button></td>
                            <td><button  type="submit"class="updatebtn btn btn-primary text-white">Update</button></td>
                    </form>
                            <td><a href="/deletecart/{{ $item->id}}" class="deletebtn btn btn-danger text-white">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var count = 1;
        var minus = document.getElementById("minus");
        var plus = document.getElementById("plus");
        var disp = document.getElementById("quantity");


    minus.onclick = function(){
        if(count>0){
        count--;
        disp.value=count;
        }
    }
        plus.onclick = function () {

            count++;
            disp.value = count;

        }
</script>
@endsection
