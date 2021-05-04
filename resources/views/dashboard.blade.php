@if (Session::has('admin'))
    {{Session::get('admin')['email']}}
@endif