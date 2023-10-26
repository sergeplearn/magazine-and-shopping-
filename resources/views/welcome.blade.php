






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








        <!

        <!-- Modal -->
        <div class="modal fade" id="exampleModalreservation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Reservation</h5>

                    </div>
                    <form action="{{route('event.store')}}" method="post">
                        @csrf
                        <div class="modal-body mb-4">







                            <div class="row">
                                <div class="col-md-6">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                         alt="Sample photo" class="img-fluid"
                                         style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-secondary d-inline float-end btn-rounded" data-mdb-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-rounded">Save changes</button>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-outline mb-3">
                                        <input type="text" name="first_name" value="{{ old('first_name')  }}" id="form3Example1m" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1m">First name</label>
                                    </div>
                                    <div class="form-outline mb-3">
                                        <input type="text" name="second_name" value="{{ old('second_name') }}" id="form3Example1m" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1m">second name</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="tel" name="tell" value="{{ old('tell') ?? '+237'   }}" data-mdb-input-mask="+237 670987654" id="phone" class="form-control " />
                                        <label class="form-label" for="form3Example1m">phone number</label>
                                    </div>
                                    <div class="form-outline mb-3">
                                        <input type="date" name="date" value="{{ old('date')  }}" id="form3Example1m" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example1m">date</label>
                                    </div>

                                    <div class="form-group mb-3">
                                        <!-- still to correct this error in the data base --->
                                        <select class="form-control" name="timeinterval_id">
                                            @foreach($times as $times)

                                                <option value="{{ $times->id }}"> {{ $times->period }}  </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-outline mb-3">
                                        <textarea type="text" name="message" id="form3Example1m" class="form-control form-control-lg"> {{ old('message')  }} </textarea>
                                        <label class="form-label" for="form3Example1m">message</label>
                                    </div>





                                </div>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>







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

                                <button class="btn btn-outline-light btn-lg m-2" data-mdb-toggle="modal" data-mdb-target="#exampleModalreservation">Reservation</button>
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
