<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::asset('css/navbar.css')}}">
    <title>Document</title>

</head>

<body>
    @extends('layouts.app')
    @section('content')
    <div class="container" style="min-height: 71.8vh">
        <h2 class="my-4">Transaction</h2>
        <table class="table mx-auto">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Transaction Time</th>
                    <th scope="col">Detail Transaction</th>

                </tr>
            </thead>
            <tbody>

                @foreach($data as $item)

                <tr>
                    <th scope="row">{{ $loop->index+1 }} </th>
                    <td>{{ $item->created_at }}</td>
                    <td><a href="/transactiondetail/{{ $item->id}}" class="btn btn-primary">Check Detail</a></td>

                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>

</html>
