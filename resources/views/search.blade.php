@extends('master')
@section('content')
<div class="container-fluid mt-5 trending">
    <h4 class="text-center text-secondary my-4 bg-light">Searched Product</h4>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 my-4">
            <a href="product/{{$product['id']}}">
                <div class="card shadow" style="background-color: rgba(113,127,142,0.25); border-color:rgb(230, 230, 248);">
                    <img class="card-img-top" height="250px" src="{{ url('assets/images')}}/{{$product['gallery']}}" alt="trending product">
                    <div class="card-body">
                        <h4 class="card-title text-secondary">{{$product['name']}}</h4>
                        <p class="card-text">{{$product['description']}}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection