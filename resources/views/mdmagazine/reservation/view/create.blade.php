
@extends('layout.mdapp')



@section('content')

    @include('alert.alert')


    <div class="row pt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8 pt-4">


            <div class="pt-4">
                <h2></h2>
                <p></p>
            </div>



            <div class="border border-3 m-1 p-3">
                <form class=" needs-validation" novalidate method="post" action="{{route('event.store')}}" enctype="multipart/form-data">

                    @csrf
                             <div class="row">
                                 <div class="col-md-4">


                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                 alt="Sample photo"  class="img-fluid mt-4"
                                 />

                                 </div>
                                 <div class="col-md-1"></div>
                                 <div class="col-md-7">


                            <h2 class="mb-3 text-center">Reservations </h2>
                            <hr>
                    @include('forms.reservation')
                            <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-rounded pt-2  w-100"> save changes</button>
                    </div>

                                 </div>
                             </div>
                </form>

            </div>


        </div>
    </div>



@stop
