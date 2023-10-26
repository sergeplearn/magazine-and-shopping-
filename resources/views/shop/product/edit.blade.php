
@extends('layout.sidenav')


@section('content')


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">



            <div class="my-5">

                <p>Shopping > Edit </p>
                <h4 class="d-inline fw-bold">Shopping post</h4>





            </div>
<div class="border border-3 p-3">
<form class=" needs-validation" novalidate method="post" action="{{route('shopping.update',$shopping->slug)}}" enctype="multipart/form-data">
@method('patch')
    @csrf

    @include('forms.shop_product')

<div class="text-center">
    <button type="submit" class="btn btn-primary btn-rounded w-50">save chang</button>
    </div>
</form>
</div>

    </div>
    </div>

@endsection
