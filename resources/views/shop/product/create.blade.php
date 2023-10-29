
@extends('layout.sidenav')





@section('style')
    <style>
        #intro {
            /* Margin to fix overlapping fixed navbar */
            margin-top: 58px;
        }

        @media (max-width: 991px) {
            #intro {
                /* Margin to fix overlapping fixed navbar */
                margin-top: 45px;
            }
        }
    </style>
@stop
@section('head')
    <div id="intro" class="p-5 text-center bg-light">
        <h1 class="mb-0 h4">This is a long title of the article</h1>
    </div>
@stop

@section('content')

    @include('alert.alert')
    <div class="row ">
        <div class="col-md-1" ></div>
        <div class="col-md-10" >
            <div class="my-5">

                <p>shop post > view > {{ $shoppings->currentPage() }}</p>
                <h4 class="d-inline fw-bold">shopping Post</h4>

@can('create',App\shopping::class)
                <a  class="btn btn-primary d-inline float-end btn-rounded" href="{{ route('shopping.create') }}">
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





            <form class=" needs-validation float-end" novalidate method="get" action="{{route('shopping.index')}}"   >
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


            <table class="table   border border-3 text-center">
        <thead>
        <tr>
            <th>no </th>
            <th>category </th>
            <th>img</th>
            <th>name </th>
            <th> price</th>
            <th> action</th>
            <th> action</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = ($shoppings->currentpage()-1)* $shoppings->perpage() + 1;?>
        @foreach($shoppings as $shopping)










            <!-- Modal delete -->
            <div class="modal fade" id="exampleModaldelete{{ $shopping->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            are u sure u want to delete this item ?
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="{{ route('shopping.destroy',$shopping->slug) }}">
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
            <td> {{ $count }} </td>
            <td>{{ $shopping->shopcategory->shop_category_name }} </td>
            <td> <img src="{{ asset('shopimg/' . $shopping->image_path)  }}"
                   width="50px" height="50px" class="img-fluid  mb-4" alt="" /></td>
            <td>{{ $shopping->title }} </td>
            <td> {{ $shopping->price }}</td>
            <td>
                @can('update',$shopping)
                <a  class="btn btn-info btn-rounded" href="{{ route('shopping.edit',$shopping->slug) }}">
Edit
                </a>
                @endcan
            </td>
            <td>
                <!-- Button trigger modal -->
                @can('delete',$shopping)
                <button type="button" class="btn btn-primary btn-rounded btn-danger" data-mdb-toggle="modal" data-mdb-target="#exampleModaldelete{{ $shopping->id }}">
                    <i class="fa-solid fa-trash fa-xl mx-3"></i>
                </button>
                    @endcan
            </td>


        </tr>
        @endforeach
        </tbody>

    </table>
    <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
            <li class="page-item">
                {{ $shoppings->links() }}
            </li>

        </ul>
    </nav>


        </div>
        <div class="col-md-1" ></div>
    </div>

@stop
