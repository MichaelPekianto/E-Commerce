@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/manage.css">

<div class="container mb-4 mx-auto">
<a class='d-flex justify-content-end me-5 pe-5 mt-3 text-decoration-none' href="/insertcategory"><button type="button"
        class="btn btn-primary text-white fw-bolder">Add Category</button></a>

    <div class="d-flex justify-content-center ">
        <table class="table table-borderless table-hover mx-auto">
            <thead>
                <tr>


                    <th scope="col" style="color:gray">Product Categories</th>

                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $d )

                <tr class='productrow'>
                    <th scope="row">

                        {{ $d->name }}
                    </th>


                    <td><a href="/updatecategory/{{ $d->id}}" class="updatebtn btn btn-white"
                            style="background-color:dodgerblue;color:white;">Edit</a>
                    </td>
                    <td><a href="/deletecategory/{{ $d->id}}" class="updatebtn btn btn-white bg-danger"
                            style="color:white;">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
