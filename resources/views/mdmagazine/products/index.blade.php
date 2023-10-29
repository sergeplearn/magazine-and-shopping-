
@extends('layout.sidenav')









@section('content')





    @include('alert.alert')


    <div class="row ">
        <div class="col-md-1" ></div>
        <div class="col-md-10" >
            <div class="my-5">

                <p>post > view > {{ $postproducts->currentPage() }}</p>
                <h4 class="d-inline fw-bold">Blog post</h4>



                <!-- Button trigger modal -->
                @can('create', App\postproduct::class)
                    <a  class="btn btn-primary float-end btn-rounded d-inline" href="{{ route('postproduct.create') }}">
                        + new post
                    </a>
                @endcan
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

        <p>Search by title only</p>
        </div>

</div>









            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <form class=" needs-validation float-end" novalidate method="get" action="{{route('postproduct.index')}}"   >
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

            <table class="table text-center  border border-3 pt-3">
                <thead>
                <tr>

                    <th>category</th>
                    <th>img</th>
                    <th>title</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($postproducts as $postproduct)




                    <!-- Modal delete -->
                    <div class="modal fade" id="exampleModaldelete{{$postproduct->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    Are u sure u want to delete this item?

                                </div>
                                <div class="modal-footer">
                                    <form class=" needs-validation" novalidate method="post" action="{{route('postproduct.destroy',$postproduct->slug)}}" enctype="multipart/form-data"  >
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
                        <td>
                            {{ $postproduct->category->category_name }}

                        </td>

                        <td><img
                                src="{{ asset('sm_img/' . $postproduct->sm_img)  }}"
                                class="img-fluid" width="50px" height="50px"
                            />
                        </td>
                        <td >
                            <span class="my-class text-truncate">{{ $postproduct->title }}</span>



                        </td>
                        <td>
                            @can('update', $postproduct)
                            <a href="{{ route('postproduct.edit',$postproduct->slug) }}" class="btn btn-rounded btn-sm btn-info"> edit</a>
                            @endcan
                        </td>
                        <td>
                            @can('delete', $postproduct)
                                <button class="btn btn-rounded btn-sm btn-danger " data-mdb-toggle="modal" data-mdb-target="#exampleModaldelete{{$postproduct->id}}">  <i class="fa-solid fa-trash fa-xl mx-3"></i></button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <nav class="my-4" aria-label="...">
                <ul class="pagination pagination-circle justify-content-center">
                    <li class="page-item">
                        {{ $postproducts->links() }}
                    </li>

                </ul>
            </nav>

        </div>
        <div class="col-md-1" ></div>
    </div>


@stop
