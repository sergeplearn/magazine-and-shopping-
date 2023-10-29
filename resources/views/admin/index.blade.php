
@extends('layout.sidenav')









@section('content')





    @include('alert.alert')


    <div class="row ">
        <div class="col-md-1" ></div>
        <div class="col-md-10" >
            <div class="my-5">

                <p>admin > view </p>
                <h4 class="d-inline fw-bold">Admins</h4>



                <!-- Button trigger modal -->

                    <a  class="btn btn-primary float-end btn-rounded d-inline" href="{{ route('User.create') }}">
                        + new user
                    </a>

            </div>









            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <form class=" needs-validation float-end" novalidate method="get" action=""   >
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
                </div>
            </div>



            <table class="table border-3 border pt-3 text-center ">
                <thead>
                <tr>
                    <th>no</th>
                    <th>name</th>
                    <th>email</th>
                    <th>role</th>
                    <th>action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)




                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   are u sure u want to delete ?

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-rounded" data-mdb-dismiss="modal">NO</button>
                                    <form action="{{ route('User.destroy',$user->id) }}" method="post">
                                        @method('Delete')
                                        @csrf
                                    <button type="submit" class="btn btn-rounded btn-danger">YES</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                    <tr>
                        <td></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button type="button" class="btn btn-rounded btn-danger" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $user->id }}">
                                delete
                            </button>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>



            <nav class="my-4" aria-label="...">
                <ul class="pagination justify-content-center">

                    <li class="page-item ">  {{ $users->links() }} </li>

                </ul>
            </nav>
        </div>
        <div class="col-md-1" ></div>
    </div>


@stop
