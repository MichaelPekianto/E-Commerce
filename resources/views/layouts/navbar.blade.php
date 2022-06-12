<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>


    <nav class="navbar navbar-expand-md d-flex align-items-center navbar-light bg-white border-bottom mt-2">
        <div class="container-fluid mx-5 ">
            <a class="d-flex align-items-center logo navbar-brand fw-bold me-auto text-secondary" href="{{ url('/') }}">
                {{ 'Store' }}<span class="fw-bold text-primary">Ku</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @if (auth()->check()==true && auth()->user()->user_role=='admin')
                <ul class="navbar-nav me-1 mb-2 mb-lg-0">
                    {{-- @if (\Request::is('manageuser*'))
                    <li class="nav-item mx-4" style="border-bottom:2px solid rgb(46, 46, 245)">

                        <a class="fw-bolder nav-link" href="/manageuser">Manage Users</a>
                    </li>
                    @else
                    <li class="nav-item mx-4 ">

                        <a class="fw-bolder nav-link" href="/manageuser">Manage Users</a>
                    </li>
                    @endif --}}
                    @if (\Request::is('managecategory*'))
                    <li class="nav-item mx-1" style="border-bottom:2px solid rgb(46, 46, 245)">
                        <a class="fw-bolder nav-link" href="/managecategory">Manage Product Categories</a>
                    </li>
                    @else
                    <li class="nav-item mx-1">
                        <a class="fw-bolder nav-link" href="/managecategory">Manage Product Categories</a>
                    </li>
                    @endif

                </ul>
                @endif
                <div class="flex-grow-1 d-flex align-items-center ">
                    <form action="/search" class="form-inline flex-nowrap bg-light mx-0 mx-lg-auto rounded p-1">
                        <div class="input-group">
                            <div class="input-group-text p-0">
                                <select class="categoryselect form-select form-select-lg shadow-none bg-light border-0" name="category"style="font-size:15px;">
                                    <option>Categories</option>

                                    <option>Hobi & Koleksi</option>
                                    <option>Sepatu Pria</option>
                                    <option>Elektronik</option>
                                    <option>Makanan & Minuman</option>
                                    <option>Pakaian Pria</option>
                               </select>
                            </div>
                            <input type="text" class="form-control" name="keyword"placeholder="Search Here">
                            <button class="input-group-text shadow-none px-4 btn-primary">
                                <i class="fa fa-search text-white"></i>
                            </button>
                        </div>

                    </form>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav  ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><button class="signin btn text-white bg-primary"
                        >{{ __('Sign In') }}</button></a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><button class="btn btn-outline-primary">{{
                                __('Sign Up') }}</button></a>
                    </li>
                    @endif
                    @else

                    <li class="nav-item d-flex align-items-center">
                        <a class="navbar-brand position-relative" href="/cart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                class="bi bi-cart" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>
                            @if (count($cartdata)=='0')
                            @elseif(count($cartdata)>'9')
                            <span
                                class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-size:10px">
                                9+

                            </span>
                            @else
                            <span
                                class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger"
                                style="font-size:10px">
                                {{ count($cartdata) }}
                            </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (Auth::user()->image!='')
                            <img class='profileimage'
                                src=" {{ Illuminate\Support\Facades\Storage::url(Auth::user()->image) }}">
                            @else
                            <img class='profileimage' src="{{ asset('image/user-profile.svg') }}" style="">
                            @endif
                        </a>

                        <ul class="dropdown-menu dropdown-menu-left"
                            style="right: 0;left: auto;padding-left: 1px;padding-right: 1px;"
                            aria-labelledby="navbarDropdown">

                            <li class="">
                                <div class="aa dropdown-item">Hi, <span class="fw-bold">{{ auth()->user()->name }}</span></div>
                            </li>
                            <li>
                                <hr class="dropdown-divider ms-2 me-2">
                            </li>
                            <li class="mt-2"><a href="/profile" class="dd dropdown-item">Your Profile</a></li>
                            <li class="mt-2"><a href="/shop" class="dd dropdown-item">Your Shop</a></li>
                            <li class="mt-2"><a href="/transactionhistory" class="dd dropdown-item">Transaction History</a></li>
                            <li class="mt-2">
                                <a class="dd dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('Sign Out') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>

                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
