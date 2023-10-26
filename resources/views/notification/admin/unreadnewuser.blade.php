
@extends('layout.sidenav')



@section('content')

<div >
    <ul class="list-group list-group-light border border-3">
        <li class="list-group-item   text-center  list-group-item-secondary"><b>Unread Notifications</b></li>
    @foreach($unread as $unread)

            <li class="list-group-item px-5 mt-2 border-0 rounded-3 list-group-item-success mb-2">

                [{{ $unread->created_at }}] user
                {{ $unread->data['name'] }} ({{ $unread->data['email'] }}){{ $unread->data['user_id'] }}

                <a class="d-inline float-end" href="/read/{{ $unread->id }}">marked as read</a>

            </li>
    @endforeach

        </ul>
</div>


@stop
