@extends('master')
@section('content')
<div class="container cartlist mt-5">
    <h3>Cart List</h3>

    <a href="/checkout" class="btn btn-success">Order Now</a>
            @foreach ($products as $item)
    <div class="row my-3 shadow-lg rounded justify-content-center align-items-center" id="cart-container">   

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
                <form action="{{route('remove.cart')}}" method="POST">
                    @csrf
                    <input type="hidden" class="product_id" name="cart" value="{{$item->cart_id}}">
                    <button type="button" @if(Session::has('user')) onclick="remove_cart(this)" @else onclick="window.location.href='/login'"  @endif class=" my-3 btn btn-danger">Remove product</button><br>
                </form>
    </div>
</div>
           @endforeach
    <a href="/checkout" class="btn btn-success">Order Now</a>
</div>
@endsection