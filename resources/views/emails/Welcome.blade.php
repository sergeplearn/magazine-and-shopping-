@component('mail::message')


"Hello, {{ $newuser->name }}!
Welcome to a world of endless
possibilities. Explore our selection
of products and services crafted to
enrich your life."

Thanks,<br>
{{ config('app.name') }}
@endcomponent
