
@extends('layout.sidenav')



@section('content')






    <div class="my-5">

        <p>category > view > {{ $categorys->currentPage() }}</p>
        <h4 class="d-inline fw-bold">shopping Category</h4>

        <!-- Button trigger modal -->
        @can('create',App\shop_category::class)
            <a type="button" class="btn btn-primary d-inline float-end btn-rounded" href="{{ route('shop_category.create') }}">
                + new category
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







    <form class=" needs-validation float-end" novalidate method="get" action="{{route('shop_category.index')}}"   >
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

    <table class="table border border-3 text-center ">
        <thead>
        <tr>
            <th>no</th>
            <th>start</th>
            <th>start</th>
            <th>action</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>


            <?php $no = ($categorys->currentpage()-1)* $categorys->perpage() + 1;?>
        @foreach($categorys as $category)









            <!-- delete a booking -->
            <div class="modal fade" id="exampleModaldelete{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deleting booking category</h5>

                        </div>
                        <div class="modal-body">



                            <p>are u sure u want to delete ?</p>



                        </div>
                        <div class="modal-footer">

                            <form class=" needs-validation" novalidate method="post" action="{{route('shop_category.destroy',$category->slug)}}" >
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
                <td>{{ $category->shop_category_name }}</td>
                <td> <img src="{{ asset('shopimg/' . $category->image_path)  }}"
                          height="50px" width="50px"    class="img-fluid" alt="" /></td>

                <td>
                    @can('update',$category)
                        <a type="submit" class="btn btn-sm btn-info btn-rounded " href="{{ route('shop_category.edit',$category->slug) }}"> <i class="fa-solid fa-pen-to-square fa-xl mx-3"></i></a>
                    @endcan
                </td>
                <td>
                    @can('delete',$category)
                        <button type="submit" class="btn btn-sm btn-danger btn-rounded " data-mdb-toggle="modal" data-mdb-target="#exampleModaldelete{{$category->id}}"> <i class="fa-solid fa-trash fa-xl mx-3"></i></button>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>


    </table>


    <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
            <li class="page-item">
                {{ $categorys->links() }}
            </li>

        </ul>
    </nav>









@stop
