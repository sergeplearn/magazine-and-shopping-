


@extends('layout.mdapp')





@section('content')

<div class="container pt-5 mt-4 text-center">
    <div class="p-5 text-center bg-light">
        <h4 class="mb-1"><strong>category : {{ $category_name }}</strong></h4>

    </div>

    <div class="row">
        @foreach($shop_categorys as $shop)

            <div class="col-md-3 p-2">

                <a class="text-black" href="{{ route('shopping.show',$shop->slug) }}" >

                <div class="card fancy_card">

                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">

                            <img
                                src="{{ asset('shopimg/' . $shop->image_path)  }}"
                                class="img-fluid"
                            />
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">{{ $shop->title }}</h5>


                    </div>
                </div>
            </a>
            </div>
        @endforeach
    </div>

    <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
            <li class="page-item">
                {{ $shop_categorys->links() }}
            </li>

        </ul>
    </nav>
</div>
@stop
