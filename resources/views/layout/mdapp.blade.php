<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
        rel="stylesheet"
    />
    @yield('headers')

    <style>
        a {text-decoration: none;}
        a:hover {text-decoration: underline;
        text-decoration-color:orange;

            border-radius: 10px;
        }

        .fancy_card:hover {
            transform: translate3D(0,-1px,0) scale(1.03);
        }
        .nav-item:hover {text-decoration: underline;
            text-decoration-color:orange;
        }


    </style>
</head>
<body>
<!--Main Navigation-->
<header>
    <!-- Intro settings -->
    @yield('style')

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
                <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="16" alt="" loading="lazy"
                     style="margin-top: -3px;" />
            </a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
                    aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="nav nav-tabs me-auto mb-2 mb-lg-0" id="ex1" role="tablist">
                    <li class="nav-item " role="presentation">
                        <a class="nav-link" href="/">Blog</a>
                    </li>



                    <li class="nav-item"   role="presentation">

                        <a class="nav-link"
                           id="ex1-tab-1"
                           href="/shop"
                        >shopping</a>
                    </li>

                </ul>

                <ul class="nav nav-tabs d-flex flex-row" role="tablist">
                    <!-- Icons -->

                    <li class="nav-link me-3 me-lg-0" role="presentation">


                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="dropdown">
                            <a

                                class="dropdown-toggle d-flex align-items-center text-muted hidden-arrow"
                                href="#"
                                id="dropdownMenuButton"
                                role="button"
                                data-mdb-toggle="dropdown"
                                aria-expanded="false"



                            >

                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <li class="nav-item"><a class="dropdown-item" href="#">Another action</a></li>
                                @if(Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a class="dropdown-item" href="/home">Another action</a>

                                </li>
                                @endif

                                <li class="nav-item"><a class="dropdown-item" href="#">Something else here</a></li>

                                <li class="nav-item"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                            </ul>

                        </div>
                        @endguest
                    </li>

                </ul>
            </div>
        </div>
    </nav>

</header>

<div class="pb-3">
    @yield('content')
</div>


<!--Footer-->
<footer class="bg-light fixed-bottom  text-lg-start mt-3">



    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!--Footer-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
></script>
<script
    type="text/javascript"
    src="/../js/validation.js"
></script>
</body>
</html>
