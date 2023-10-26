
@extends('layout.sidenav')



@section('content')



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    <div class="row ">
        <div class="col-md-1" ></div>
        <div class="col-md-10" >
            <div class="my-5">

                <p>reservation > view > {{ $reservations->currentPage() }}</p>
                <h4 class="d-inline fw-bold">Blog reservation</h4>


                <!-- Button trigger modal -->
                <a type="button" class="btn btn-primary d-inline float-end btn-rounded" href="{{ route('event.create') }}" >
                    + new reservation
                </a>
            </div>



            <div
  class="toast show bg-info fade mx-auto"
  id="static-example"
  role="alert"
  aria-live="assertive"
  aria-atomic="true"
  data-mdb-autohide="false"
>
  <div class="toast-header">
    <strong class="me-auto">search tips</strong>

    <button type="button" class="btn-close" data-mdb-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body text-white">

        <p>correct format for date search is Y-M-D</p>
        <p>correct format phone number is +237....</p>
        <p>you can search by name, phone, date</p>

  </div>

</div>





            <form class=" needs-validation float-end" novalidate method="get" action="{{route('event.index')}}"   >
                @csrf
                <div class="input-group my-2">
                    <div class="form-outline">
                        <input type="search" id="form1" name="search" class="form-control" />
                        <label class="form-label" for="form1">Search</label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            <table class="table border border-3 text-center">
                <thead>
                <tr>
                    <th>no</th>
                    <th>Date</th>
                    <th>time</th>
                    <th>name</th>
                    <th>phone</th>

                    <th>action</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>


                <?php $no = ($reservations->currentpage()-1)* $reservations->perpage() + 1;?>
                @foreach($reservations as $reservation)

                    <!-- Button trigger modal -->




                    <!-- delete a booking -->
                    <div class="modal fade" id="exampleModaldelete{{$reservation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Deleting booking reservation</h5>

                                </div>
                                <div class="modal-body">



                                    <p>are u sure u want to delete ?</p>



                                </div>
                                <div class="modal-footer">

                                    <form class=" needs-validation" novalidate method="post" action="{{route('event.destroy',$reservation->slug)}}" >
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-rounded  btn-secondary " data-mdb-dismiss="modal"><i class="fa-solid fa-x fa-xl mx-3"></i></button>
                                        <button type="submit" class="btn  btn-rounded btn-danger"> <i class="fa-solid fa-check fa-xl mx-3"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                    <tr>
                        <td> {{ $no++ }}</td>
                        <td>
                            {{ $reservation->date->format('d M Y') }}
                        </td>
                        <td>
                            {{ $reservation->timeinterval->start_time }} -  {{ $reservation->timeinterval->end_time }}
                        </td>
                        <td>
                            {{ $reservation->fullname }}
                        </td>
                        <td>
                            {{ $reservation->telli }}
                        </td>
                        <td>
                            <a type="submit" class="btn btn-sm btn-info btn-rounded " href="{{ route('event.edit',$reservation->slug) }}"> <i class="fa-solid fa-pen-to-square fa-xl mx-3"></i></a>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-danger btn-rounded " data-mdb-toggle="modal" data-mdb-target="#exampleModaldelete{{$reservation->id}}"> <i class="fa-solid fa-trash fa-xl mx-3"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>


            </table>


            <nav class="my-4" aria-label="...">
                <ul class="pagination pagination-circle justify-content-center">
                    <li class="page-item">
                        {{ $reservations->links() }}
                    </li>

                </ul>
            </nav>





        </div>
        <div class="col-md-1" ></div>
    </div>



@stop
