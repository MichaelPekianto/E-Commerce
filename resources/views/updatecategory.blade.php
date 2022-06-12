<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/profile.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/insertgame.css') }}">
</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h2 class="fw-bold mb-5">Update Category</h2>

        <form action="/updatecategory/{{ $data->id }}" method="post">
            @csrf


            <div class="row mb-5" style="color:gray;">
                <label for="inputGenre" class="col-sm-2 col-form-label">Product Category</label>
                <div class="col-sm-10">
                    <input name="name" value="{{  $data->name }}" type="text"
                        class="form-control @error('name') is-invalid @enderror" id="name" autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary"
                    style="border:none;background-color:dodgerblue">Update</button>
            </div>

        </form>

    </div>

    @endsection
</body>

</html>
