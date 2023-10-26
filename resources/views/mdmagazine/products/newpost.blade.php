
@extends('layout.sidenav')









@section('content')


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">



    <div class="my-5">

        <p>post > Create </p>
        <h4 class="d-inline fw-bold">Blog post</h4>





    </div>



<div class="border border-3 p-3">
                <form class=" needs-validation" novalidate method="post" action="{{route('postproduct.store')}}" enctype="multipart/form-data"  >
                    @csrf



                    @include('forms.blog_form')


<div class="text-center">
                    <button type="submit" class="btn btn-primary btn-rounded w-50 text-center">submit</button>
</div>
                </form>

                </div>



        </div>
    </div>






    @stop
