


@extends('layout.mdapp')


@section('content')
    <header>
        <style>
            /* Carousel styling */
            #introCarousel,
            .carousel-inner,
            .carousel-item,
            .carousel-item.active {
                height: 100vh;
            }

            .carousel-item:nth-child(1) {
                background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }
            .carousel-item:nth-child(2) {
                background-image: url('https://mdbootstrap.com/img/Photos/Others/images/77.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }
            .carousel-item:nth-child(3) {
                background-image: url('https://mdbootstrap.com/img/Photos/Others/images/78.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }

            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #introCarousel {
                    margin-top: -58.59px;
                }
                #introCarousel,
                .carousel-inner,
                .carousel-item,
                .carousel-item.active {
                    height: 50vh;
                }
            }




        </style>



        <!-- carousel -->
        <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-mdb-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg" class="d-block w-100" alt="Wild Landscape"/>
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                    <div class="carousel-caption d-none d-sm-block mb-5">
                        <h1 class="mb-4">
                            <strong>Learn Bootstrap 5 with MDB</strong>
                        </h1>


                        <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white btn-lg">Start free tutorial
                            <i class="fas fa-graduation-cap ms-2"></i>
                        </a>
                    </div>
                </div>


            </div>

        </div>



        <div class="container">

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark mt-3 mb-5 shadow p-2" style="background-color: #607D8B">
                <!-- Container wrapper -->
                <div class="container-fluid">

                    <!-- Navbar brand -->
                    <a class="navbar-brand" href="#">Categories:</a>

                    <!-- Toggle button -->
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-mdb-toggle="collapse"
                        data-mdb-target="#navbarSupportedContent2"
                        aria-controls="navbarSupportedContent2"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <!-- Link -->

                            <li class="nav-item">
                            @foreach($shop_categorys as $shop)
                                <li><a class="nav-link text-white" href="{{ route('shop_category.show',$shop->slug) }}">{{ $shop->shop_category_name }}  </a></li>
                                @endforeach

                                </li>
                        </ul>

                        <!-- Search -->
                        <form class="w-auto py-1"  action="/shop" method="get"  style="max-width: 12rem">

                            <div class="input-group">
                                <div class="form-outline">
                                    <input type="search" name="search" id="form1" class="form-control rounded-0 text-white"  aria-label="Search"/>
                                    <label class="form-label" for="form1">Search</label>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
                <!-- Container wrapper -->
            </nav>
            <!-- Navbar -->



            <div class="row">
                @foreach($shop_categorys as $shop)




                    <div class="col-md-3 p-2">

                        <a href="{{ route('shop_category.show',$shop->slug) }}" class="text-reset">

                            <div class="card fancy_card">
                                <h5 class="card-title text-center my-2">{{ $shop->shop_category_name }}</h5>
                                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">



                                    <img src="{{ asset('shopimg/' . $shop->image_path)  }}"
                                         class="img-fluid shadow-2-strong rounded-5 mb-2" alt="" />



                                </div>
                                <div class="card-body text-center">

                                    <a href="{{ route('shop_category.show',$shop->slug) }}">see more</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <nav class="my-4 pb-3" aria-label="...">
                <ul class="pagination pagination-circle justify-content-center">
                    <li class="page-item">
                        {{ $shop_categorys->links() }}
                    </li>

                </ul>
            </nav>

        </div>
@stop
