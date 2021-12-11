@extends('master')
@section('content')
<div class="container-fluid  trending">
    <h4 class="text-center text-secondary m3-4 ">Searched Products</h4>
    <div class="row">
        @if (!empty($products)) 
        @foreach($products as $product)
        <div class="col-md-3 my-4">
            <a href="product/{{$product['id']}}">
                <div class="card shadow searched-product" style="background-color:transparent; border-color:rgb(230, 230, 248);">
                    <div class="image-hover">
                        <img class="card-img-top" height="250px" src="{{ url('assets/images')}}/{{$product['gallery']}}" 
                        alt="searched product">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-secondary">{{$product['name']}}</h4>
                        <p class="card-text">{{$product['description']}}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
       
    </div>
</div>
@endsection