@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<div class="container">
    <h2 class="mb-3">Create New Shop</h2>
    <form action="/createnewshop" method="POST">
        @csrf
<div class="row g-3 align-items-center mb-5">
    <div class="col-sm-2">
        <label for="inputShopName" class="col-form-label">Name</label>
    </div>
    <div class="col-sm-10 mb-3">
        <input type="text" id="inputShopName" name="shopname"class="form-control @error('shopname') is-invalid @enderror" value="{{ old('shopname') }}" aria-describedby="shopnameHelpInline">
        @error('shopname')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-sm-6 my-2">
        <span id="shopnameHelpInline" class="form-text">
            Must be 5-20 characters long.
        </span>
    </div>
</div>
<div class="row g-3 align-items-center mb-5">
    <div class="col-sm-2">
        <label for="inputShopdescription" class="col-form-label">Shop description</label>
    </div>
    <div class="col-sm-10">
        <textarea id="inputShopdescription" name="shopdescription" class="form-control @error('shopdescription') is-invalid @enderror" value="{{ old('shopdescription') }}"></textarea>
        @error('shopdescription')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
<div class="row align-items-center mb-5">
    <div class="col-sm-2">
        <label for="inputShopduration" class=" col-form-label">Open duration</label>
    </div>
    <div class="col-2 col-sm-2">
        <input id="inputShopduration" name="OpeningDay" type="text"
            class="form-control @error('OpeningDay') is-invalid @enderror" value="{{ old('OpeningDay') }}"placeholder="Monday">
        @error('OpeningDay')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
<div class="col-1 align-items-center"> - </div>
    <div class="col-2 col-sm-2">
        <input id="inputShopduration" name="ClosingDay" type="text"
            class="form-control @error('ClosingDay') is-invalid @enderror"placeholder="Monday" value="{{ old('ClosingDay') }}">
        @error('ClosingDay')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>
    <div class="row align-items-center mb-5">
        <div class="col-sm-2">
            <label for="inputShopHours" class=" col-form-label">Opening Hours</label>
        </div>
       <div class="col-1 col-sm-1">
        <input id="inputShopHours" name="OpeningHours" type="value"
            class="form-control @error('OpeningHours') is-invalid @enderror" placeholder="00"
            value="{{ old('OpeningHours') }}">
        @error('OpeningHours')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-1 "> - </div>
    <div class="col-1 col-sm-1">
        <input id="inputShopHours" name="ClosingHours" type="value"
            class="form-control @error('ClosingHours') is-invalid @enderror" placeholder="00"
            value="{{ old('ClosingingHours') }}">
        @error('ClosingHours')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    </div>
    <div class="position-relative">
        <button type="submit" class="position-absolute start-100 translate-middle btn btn-primary border-white"
            style="background-color:dodgerblue;">Submit</button>
    </div>
    </form>
</div>
@endsection
