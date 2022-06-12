<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/profile.css')  }}">

</head>

<body>
    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h2 class="fw-bold mb-5">Update Product</h2>

        <form action="/update/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-5" style="color:gray;">
                <label for="inputname" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-10">
                    <input name="name" type="text" value="{{ $data->name }}"class="form-control @error('name') is-invalid @enderror"
                        id="inputname" autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-5" style="color:gray;">
                <label for="inputPhoto" class="col-6 col-sm-2 col-form-label">Image</label>
                <img id="profile-image" class='col-6 col-sm-1 rounded-circle'
                    style="width:75px;height: 50px;"src="{{ Storage::url($data->image) }}">
                <div class="col-6 col-sm-5"></div>
                <div class="col-6 col-sm-4">
                    <input name="image" type="file" style='color:dodgerblue' onchange="readURL(this)"
                        class="form-control @error('image') is-invalid @enderror" id="image">

                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-5" style="color:gray;">
                <label for="inputDesc" class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                    <textarea name="desc" type="text" rows="4" cols="50"
                        class="form-control @error('desc') is-invalid @enderror" id="desc">{{ $data->desc }}</textarea>
                    @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row mb-5" style="color:gray;">
                <label for="inputprice" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input name="price" type="value" value="{{ $data->price }}"class="form-control @error('price') is-invalid @enderror"
                        id="price">
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="row mb-5" style="color:gray;">
                <label for="inputcategory" class="col-sm-2 col-form-label">Product Category</label>
                <div class="col-sm-10">
                    <select name="category" id="inputcategory" class="form-select">
                        <option selected>{{ $data->getCategory->name }}</option>
                        @foreach ($data2 as $d)
                        @if($d->name!=$data->getCategory->name)
                        <option>{{ $d->name }}</option>
                         @endif
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="row mb-5" style="color:gray;">
                <label for="inputstock" class="col-sm-2 col-form-label">Product Stock</label>
                <div class="col-sm-10">
                    <input name="stock" type="value" value="{{ $data->stock }}"class="form-control @error('stock') is-invalid @enderror"
                        id="stock">
                    @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>

            <div class="position-relative">
                <button type="submit" class="position-absolute start-100 translate-middle btn btn-primary"
                    style="border:none;background-color:dodgerblue">Add</button>
            </div>

        </form>

    </div>
    <script src="{{ asset('js/file.js') }}"></script>
    @endsection
</body>

</html>
