@extends('master')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4 bg-white shadow p-2 m-2 mt-5" style="border-radius:10px;">
            <div class="">
                <h4 class="text-center text-secondary">Sign up</h4>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                        @php
                         Session::forget('success');   
                        @endphp
                    </div>

                @endif
                {{-- check for error messages --}}
                @if ($errors->any())
                    <div class=" alert py-0 alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-group" enctype="multipart/form-data" method="POST" action="/register">
                    @csrf
                    <label for="name">First Name</label>
                    <input type="text" name="first_name" required placeholder="" class="form-control">
                    <label for="name">Last Name</label>
                    <input type="text" name="last_name" required placeholder="" class="form-control">
                    <label for="email">Email</label>
                    <input type="email" name="email" required class="form-control" id="">
                    <label for="email">Phone</label>
                    <input type="number" name="phone" required class="form-control" id="">
                    <label for="address">Address</label>
                    <input type="text" name="address" required class="form-control" id="">
                    {{-- <label for="image">Choose Image</label>
                    <input type="file" name="image" required class="form-control"><br> --}}
                    <label for="password">Password</label>
                    <input type="password" name="password" required class="form-control"><br>
                    <div style="display:flex;">
                        <button type="submit" class="btn btn-primary mr-auto" name="signup">Sign up</button>
                        <a class="btn btn-danger" href="/login">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection