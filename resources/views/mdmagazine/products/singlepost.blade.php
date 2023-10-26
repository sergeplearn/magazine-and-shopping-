@extends('layout.mdapp')


@section('content')


    <style>
        #intro {
            /* Margin to fix overlapping fixed navbar */
            margin-top: 58px;
        }

        @media (max-width: 991px) {
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 45px;
            }
        }
    </style>


    <div id="intro" class="p-5 text-center bg-light">
        <h1 class="mb-0 h4"> {{ $postproduct->title }}  </h1>
    </div>



    <!-- Jumbotron -->


<!--Main Navigation-->


    <!-- Jumbotron -->
<!--Main layout-->
<main class="mt-4 mb-5">
    <div class="container">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-8 mb-4">
                <!--Section: Post data-mdb-->
                <section class="border-bottom mb-4">
                    <img src="{{ asset('images/' . $postproduct->image_path)  }}"
                         class="img-fluid shadow-2-strong rounded-5 mb-4" alt="" />

                    <div class="row align-items-center mb-4">
                        <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (23).jpg" class="rounded-5 shadow-1-strong me-2"
                                 height="35" alt="" loading="lazy" />
                            <span> Published <u>15.07.2020</u> by</span>
                            <a href="" class="text-dark">Anna</a>
                        </div>

                        <div class="col-lg-6 text-center text-lg-end">
                            <button type="button" class="btn btn-primary px-3 me-1" style="background-color: #3b5998;">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button type="button" class="btn btn-primary px-3 me-1" style="background-color: #55acee;">
                                <i class="fab fa-twitter"></i>
                            </button>
                            <button type="button" class="btn btn-primary px-3 me-1" style="background-color: #0082ca;">
                                <i class="fab fa-linkedin"></i>
                            </button>
                            <button type="button" class="btn btn-primary px-3 me-1">
                                <i class="fas fa-comments"></i>
                            </button>
                        </div>
                    </div>
                </section>
                <!--Section: Post data-mdb-->

                <!--Section: Text-->
                <section>
                    <p>
                        {!! $postproduct->body !!}
                    </p>
                </section>






                <!--Section: Share buttons-->
                <section class="text-center border-top border-bottom py-4 mb-4">
                    <p><strong>Share with your friends:</strong></p>

                    <button type="button" class="btn btn-primary me-1" style="background-color: #3b5998;">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button type="button" class="btn btn-primary me-1" style="background-color: #55acee;">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button type="button" class="btn btn-primary me-1" style="background-color: #0082ca;">
                        <i class="fab fa-linkedin"></i>
                    </button>
                    <button type="button" class="btn btn-primary me-1">
                        <i class="fas fa-comments me-2"></i>Add comment
                    </button>
                </section>
                <!--Section: Share buttons-->





                @comments([
                'model' => $postproduct,
                'perPage' => 2
                ])


            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">
                <!--Section: Sidebar-->
                <section class="sticky-top" style="top: 80px;">
                    <!--Section: Ad-->
                    <section class="text-center border-bottom pb-4 mb-4">
                        <div class="bg-image hover-overlay ripple mb-4">
                            <img
                                src="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/content/en/_mdb5/standard/about/assets/mdb5-about.webp"
                                class="img-fluid" />
                            <a href="https://mdbootstrap.com/docs/standard/" target="_blank">
                                <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);"></div>
                            </a>
                        </div>

                    </section>
                    <!--Section: Ad-->

                    <!--Section: Video-->
                    <section class="text-center">
                        <h5 class="mb-4">Learn the newest Bootstrap 5</h5>

                        <div class="embed-responsive embed-responsive-16by9 shadow-4-strong">
                            <iframe class="embed-responsive-item rounded-5" src="https://www.youtube.com/embed/c9B4TPnak1A"
                                    allowfullscreen></iframe>
                        </div>
                    </section>
                    <!--Section: Video-->
                </section>
                <!--Section: Sidebar-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
</main>
<!--Main layout-->

@endsection

