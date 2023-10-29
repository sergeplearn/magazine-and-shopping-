

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">





    <title>{{ config('app.name', 'Laravel') }}</title>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->


    <!-- Font Awesome -->
    <link href="/../css/sidenave.css" rel="stylesheet" />

    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
        rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/mdb/css/mdb.min.css" />



    @yield('style')

</head>
<body>

<!--Main Navigation-->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a
                    href="#"
                    class="list-group-item list-group-item-action py-2 ripple"
                    aria-current="true"
                >
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                </a>

                <a href="{{ route('User.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-plus me-3 fa-fw"></i><span>Admin</span></a
                >

                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                ></a
                >

                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                ><span><b>Bloging side</b></span></a
                >
                <a href="{{ route('postproduct.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-plus me-3 fa-fw"></i><span>new post</span></a
                >
                <a href="{{ route('timeinterval.index') }}" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-plus me-3 fa-fw"></i><span>booking time</span>
                </a>
                <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa-solid fa-plus me-3 "></i><span>Category</span></a
                >
                <a href="{{ route('event.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fa fa-ticket me-3 fa-fw" aria-hidden="true"></i><span>Reservation</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                ></a
                >

                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                ><span><b>shopping side</b></span></a
                >
                <a href="{{ route('shopping.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-plus me-3 fa-fw"></i><span> shopping</span></a
                >
                <a href="{{ route('shop_category.index') }}" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-plus me-3 fa-fw"></i><span> category</span></a
                >

                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                ></a
                >

                <a href="#" class="list-group-item list-group-item-action py-2 ripple"
                ><span><b>User View</b></span></a
                >

                <a href="/" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-users fa-fw me-3"></i><span>Blog</span></a
                >
                <a href="{{ route('shop.show') }}" class="list-group-item list-group-item-action py-2 ripple"
                ><i class="fas fa-money-bill fa-fw me-3"></i><span>shop</span></a
                >
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Toggle button -->
            <button
                class="navbar-toggler"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>

            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img
                    src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
                    height="25"
                    alt="MDB Logo"
                    loading="lazy"
                />
            </a>
            <!-- Search form -->
            <form class="d-none d-md-flex input-group w-auto my-auto">
                <input
                    autocomplete="off"
                    type="search"
                    class="form-control rounded"
                    placeholder='Search (ctrl + "/" to focus)'
                    style="min-width: 225px;"
                />
                <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
            </form>


            <!-- Right links -->
            <ul class="navbar-nav ms-auto d-flex flex-row">

                <li class="nav-item mr-3">
                    <a href="/unread/{{ Auth::user()->id }}"class="nav-link"><i class="fas fa-envelope fa-lg"><span class='badge rounded-pill badge-notification bg-danger'>

                                @if( $count == 0)
                                @else
                                    {{ $count }}
                                @endif

                               </span></i></a>


                </li>
                <!-- Notification dropdown -->
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
                <!-- Avatar -->
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                    >
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuLink"
                    >
                        <li>
                            <a class="dropdown-item" href="#">My profile</a>

                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Settings</a>
                        </li>
                        <li>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </li>
                    </ul>
                </li>
                @endguest
























            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;" class= "mb-5">
    <div class="container pt-4  justify-content-center">
        @yield('content')
    </div>

</main>
<!--Main layout-->









<!-- MDB -->



<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
></script>
</body>
</html>















