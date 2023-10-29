@extends('layout.mdapp')
@section('style')
    <style>
        #intro {
            /* Margin to fix overlapping fixed navbar */
            margin-top: 68px;
        }

        @media (max-width: 991px) {
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 45px;
            }
        }

        .input
        {
            max-height: 180px;
             /* or whatever width you want. */
        }
    </style>
@stop


@section('content')






<!--Main layout-->
<main class="mt-5 pt-4 pb-4">
    <div class="container">

        <section class="text-center ">
            <div class="p-5 text-center bg-light">
                <h4 class="mb-3"><strong>category : {{ $categoryname }}</strong></h4>

            </div>


        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-4 p-2 fancy_card">
                <a href="{{ route('postproduct.show',$category->slug) }}" class="text-black">

                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{ asset('sm_img/' . $category->sm_img)  }}" class="img-fluid pb-3"/>

                    </div>

                        <h5>{{ $category->title }}</h5>


              </a>
            </div>
            @endforeach
        </div>


        </section>
        <!--Section: Content-->

        <!-- Pagination -->
        <nav class="my-4" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">

                <li class="page-item">{{ $categories->links() }}</li>

            </ul>
        </nav>
    </div>

</main>



<!--Main layout-->
<!--Footer-->
<!-- MDB -->

@stop
