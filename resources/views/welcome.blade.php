






@extends('layout.mdapp')

@section('title', 'home')
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


        <!-- Carousel wrapper -->
        <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong mt-4" data-mdb-ride="carousel">
            <!-- Indicators -->


            <!-- Inner -->
            <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-white text-center">
                                <h1 class="mb-3 h4">Learn Bootstrap 5 with MDB</h1>
                                <h5 class="mb-4">Best & free guide of responsive web design</h5>

                                <a class="btn btn-outline-light btn-lg m-2" href="/reservat" >Reservation</a>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- Single item -->

            </div>
            <!-- Inner -->

            <!-- Controls -->

        </div>
        <!-- Carousel wrapper -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5">
        <div class="container">
            <!--Section: Content-->
            <main class="mt-5">
                <div class="container">
                    <!--Section: Content-->
                    <section class="text-center">
                        <h4 class="mb-5"><strong>Categories for article</strong></h4>

                        <div class="row">
                            @foreach( $categorys as $category )
                                <div class="col-lg-4 col-md-12 mb-4">

                                    <div class="bg-image rounded-3 mb-4 shadow-1-strong hover-overlay ripple" >
                                        <img
                                            src="{{ asset('blogcategory/' . $category->image_path)  }}"
                                            class="img-fluid"
                                        />

                                    </div>

                                    <h5 >{{ $category->category_name }}</h5>

                                    <a href="{{route('category.show',$category->slug)}}" class="btn btn-primary btn-rounded mx-3">See more </a>



                                </div>

                            @endforeach
                        </div>
                    </section>
                    <!--Section: Content-->

                    <nav class="my-4" aria-label="...">
                        <ul class="pagination pagination-circle justify-content-center">

                            <li class="page-item"> {{ $categorys->links() }} </li>

                        </ul>
                    </nav>







                    <hr class="my-5" />

                    <!--Section: Content-->

                    <!--Section: Content-->

                    <hr class="my-5" />


                </div>
            </main>
            <!--Main layout-->


@stop
