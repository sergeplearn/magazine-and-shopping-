
@extends('layout.sidenav')









@section('content')


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">



            <div class="my-5">

                <p>post > edit </p>
                <h4 class="d-inline fw-bold">Edit Details for {{ $postproduct->title }}</h4>





            </div>

            <div class="border border-3 p-4">


            <form class=" needs-validation" novalidate method="post" action="{{route('postproduct.update',$postproduct->slug)}}" enctype="multipart/form-data"  >
                @csrf


                @method('patch')
                @include('forms.blog_form')

<div class="text-center">

 <button type="submit" class="btn btn-primary btn-rounded w-50">save post</button>


</div>
</form>



</div>


        </div>
    </div>






@stop
