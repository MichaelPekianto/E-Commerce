<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('css/tdetail.css') }}">


</head>

<body>
    @extends('layouts.app')
    @section('content')
    <div class="container" style="min-height: 71.8vh">
        <h2 class="mb-5">Cart</h2>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item Name</th>
                    <th scope="col"class="desc">Item Detail</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">SubTotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count=0
                @endphp

                @foreach($data as $item)

                <tr>
                    <th scope="row">{{ $loop->index+1 }} </th>
                    <td>{{ $item->getProducts->name }}</td>
                    <td>{{ $item->getProducts->desc}}</td>
                    <td>{{ $item->getProducts->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{$item->quantity*$item->getProducts->price }}</td>
                    @php
                        $count+=$item->quantity*$item->getProducts->price
                    @endphp

                </tr>

                @endforeach
            </tbody>
        </table>
        <p class="text-right">Grand Total: Rp.{{ $count }},-</p>
    </div>
    @endsection

</body>

</html>
