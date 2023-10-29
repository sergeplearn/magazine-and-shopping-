
@extends('layout.sidenav')









@section('content')


    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">



            <div class="my-5">

                <p>Register_admin > Create </p>
                <h4 class="d-inline fw-bold">New Admin</h4>





            </div>



            <div class="border border-3 p-3">
                <form class=" needs-validation" novalidate method="post" action="{{route('User.store')}}" enctype="multipart/form-data"  >
                    @csrf



                    @include('forms.newadmin')


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-rounded w-100 btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>



        </div>
    </div>






@stop
