@extends('master')
@section('content')
    <div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4 bg-white shadow p-2 m-2 mt-5" style="border-radius:10px;">
            <div class="">
                <h5 class="login-header my-2 p-2 text-center shadow bg-light text-secondary">User | <span class="text-danger"> Login </span></h5>
                @if (Session::has('failure'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{Session::get('failure')}}
                        @php
                            Session::forget('failure');
                        @endphp
                    </div>
                @endif
                @if ($errors->any())
                   <div class=" py-0 alert alert-danger" role="alert">
                       <ul>
                           @foreach ($errors->all() as $error)
                               <li>{{$error}}</li>
                           @endforeach
                       </ul>
                   </div> 
                @endif
                <form class="form-group" enctype="multipart/form-data" method="POST" action="/login">
                    @csrf
                    <label for="email">Email</label>
                    <input type="email" name="email" required  class="form-control" id=""><br>
                    <label for="password">Password</label>
                    <input type="password" name="password" required class="form-control"><br>
                    <div style="display:flex;">
                        <button type="submit" class="btn btn-danger mr-auto" name="login">Login</button>
                        <a class="btn btn-primary" href="/register">Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection