
@extends('layout.sidenav')



@section('content')

    @include('alert.alert')


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">



            <div class="my-3">

                <p>category > create </p>
                <h4 class="d-inline fw-bold">Category</h4>





            </div>


            <div class="border border-3 p-5">
                <form class=" needs-validation" novalidate method="post" action="{{route('timeinterval.store')}}" enctype="multipart/form-data">

                        @csrf

                    @include('forms.timeinterval')
                    <select class="form-select mb-3" name="status" aria-label="Default select example">
                        <option value="1" >Active</option>
                        <option value="0" >inactive </option>

                    </select>



                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-rounded pt-2  w-50"> save changes</button>
                    </div>
                </form>

            </div>


        </div>
    </div>



@stop
