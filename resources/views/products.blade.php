@extends('master')
@section('content')
    <div class="container mt-0 mb-5">
        <div class="row">
            <div class="col-md-6 my-4">
                {{-- <a href="product/{{$product['id']}}"> --}}
                    <div class=" product shadow" style=" border-color:rgb(230, 230, 248);">
                        <img class="card-img-top" src="{{ url('assets/images')}}/{{$product['gallery']}}" alt="trending product">
                    </div>
            </div>

            <div class="col-md-6">
                <div class="card-body">
                    <a href="/">previous page</a>
                    <h2 class="card-title text-secondary">{{$product['name']}}</h2>
                    <h4 class="text-secondary">Price : <span class="badge badge-pill badge-danger">{{$product['price']}}</span> </h4>
                    <h4 class="text-secondary">Product Category : {{$product['category']}}</h4>
                    <p class="card-text">Product Description : {{$product['description']}}</p>
                    <br><br><br>
                    <form action="/addtocart" method="POST">
                        @csrf
                        <input type="hidden" name="cart" value="{{$product['id']}}">
                        <button class=" my-3 btn btn-danger">Add to cart</button><br>
                    </form>
                    <button type="button" class="btn btn-success">Buy now</button>
                </div>
            </div>
        </div>
    </div>
@endsection