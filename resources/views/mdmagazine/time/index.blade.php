
@extends('layout.sidenav')



@section('content')

    @include('alert.alert')

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

            <p>Time_intervals > view > {{ $times->currentPage() }}</p>
            <h4 class="d-inline fw-bold">Time intervals</h4>


            <a class="btn btn-primary btn-rounded float-end d-inline" href="{{route('timeinterval.create')}}" >
                + new time
            </a>
        </div>

        <table class="table border border-3 text-center ">
            <thead>
            <tr>
                <th>no</th>
                <th>status</th>
                <th>start</th>
                <th>end</th>
                <th>action</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>

            <?php $no = ($times->currentpage()-1)* $times->perpage() + 1;?>
            @foreach($times as $time)






                <!-- delete a booking -->
                <div class="modal fade" id="exampleModaldelete{{$time->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Deleting booking time</h5>

                            </div>
                            <div class="modal-body">



                                <p>are u sure u want to delete ?</p>



                            </div>
                            <div class="modal-footer">

                                <form class=" needs-validation" novalidate method="post" action="{{route('timeinterval.destroy',$time->id)}}" >
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
                    <td>{{ $no++ }} </td>
                    <td>{{ $time->status }}</td>
                    <td>{{ $time->start_time }}</td>
                    <td>{{ $time->end_time }}</td>
                    <td>
                        <a class="btn btn-sm btn-info btn-rounded " href="{{ route('timeinterval.edit',$time->id)}}"> <i class="fa-solid fa-pen-to-square fa-xl mx-3"></i></a>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-danger btn-rounded " data-mdb-toggle="modal" data-mdb-target="#exampleModaldelete{{$time->id}}"> <i class="fa-solid fa-trash fa-xl mx-3"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <nav class="my-4" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
                <li class="page-item">
                    {{ $times->links() }}
                </li>

            </ul>
        </nav>








    </div>
    <div class="col-md-1" ></div>
</div>



@stop
