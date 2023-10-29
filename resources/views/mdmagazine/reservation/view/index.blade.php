@extends('layout.mdapp')


@section('content')

<main class="my-5 py-5 ">
    <div class="container">

    <div class="p-5 text-center bg-light">
        <h4 class="mb-3"><strong>RESERVATION</strong></h4>

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

    </div>


    <form class=" needs-validation pt-2" novalidate method="get" action="{{ route('reservation.index') }}"   >
        @csrf
        <div class="col-md-3">
        <div class="input-group my-2">

            <div class="form-outline">

                <input type="search" id="form1" name="search" width="30" class="form-control" />
                <label class="form-label" for="form1">Search</label>

            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
    </form>

<div class="container  pt-2">
<div class="row">
    @foreach($events as $event)
    <div class="col-md-3 p-2">
        <div class="card">
            <div class="card-body">
            <div class="card-title text-center"><b> {{ $event->fullname }} </b></div>
            <table class="table table-borderless card-text">
            <tr>
                    <th>start_time</th>
                    <td>{{ $event->timeinterval->start_time }}</td>
                </tr>
                <tr>
                    <th>end_time</th>
                    <td>{{ $event->timeinterval->end_time }}</td>
                </tr>
                <tr>
                    <th>date</th>
                    <td>{{ $event->date->format('d-M-Y') }}</td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>



<nav class="my-4" aria-label="...">
                <ul class="pagination pagination-circle justify-content-center">
                    <li class="page-item">
                        {{ $events->links() }}
                    </li>

                </ul>
            </nav>



</div>
</main>
@endsection

