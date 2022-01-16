<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ url('assets/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{ url('assets/css/style.css')}}" type="text/css" rel="stylesheet">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ url('assets/css/sweetalert2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{url('assets/bootstrap.min.css')}}"> --}}
    <title>Ecommerce | Laravel</title>
</head>
<body>
    {{View::make('header')}}
    @yield('content')
    {{View::make('footer')}}

    <script src="{{ url('assets/js/jquery.min.js')}}"></script>
    <script src="{{ url('assets/js/script.js')}}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('assets/js/popper.min.js')}}"></script>
    <script src="{{ url('assets/js/sweetalert2.min.js')}}"></script>
</body>
</html>