@extends('master')
@section('content')
<div class="container cartlist mt-5">
    <h3>Cart List</h3>
    <a href="/checkout" class="btn btn-success">Order Now</a>
    <div class="row my-3 shadow-lg rounded justify-content-center align-items-center">    
            @foreach ($products as $item)
            <div class="col-md-4">
                <div class="card my-3 shadow cart-container">
                    <a href="/detail/{{$item->id}}">
                        <div class="image-hover">
                            <img class="card-img-top product_images" src="{{ url('assets/images')}}/{{$item->gallery}}" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <h4 class="card-title">{{$item->name}}</h4>
                    <p class="card-text">{{$item->description}}</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <a href="removecart/{{$item->cart_id}}" class="btn btn-warning">Remove</a>
            </div>
           @endforeach
    </div>
    <a href="/checkout" class="btn btn-success">Order Now</a>
</div>
@endsection