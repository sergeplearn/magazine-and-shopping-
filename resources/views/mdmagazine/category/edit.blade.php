
@extends('layout.sidenav')



@section('content')

    @include('alert.alert')

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">



            <div class="my-5">

                <p>category > edit </p>
                <h4 class="d-inline fw-bold">Edit Category for {{ $category->category_name }}</h4>





            </div>


            <div class="border border-3 p-5">
                                <form class=" needs-validation" novalidate method="post" action="{{route('category.update',$category->slug)}}" enctype="multipart/form-data">

                                        @csrf
                                        @method('patch')

                                        @include('forms.blog_category')
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-rounded w-50"> save changes</button>
                                    </div>
                                </form>
            </div>


</div>
    </div>


@stop
