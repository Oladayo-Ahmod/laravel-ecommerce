@extends('master')
@section('content')
<div class="container mt-3 mb-5">
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1"></li>
            <li data-target="#carouselId" data-slide-to="2"></li>
            <li data-target="#carouselId" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
         @foreach ($products as $product)
            
             <div class="carousel-item {{$product['id'] == 3 ? 'active': '' }}">
                 <a href="product/{{$product['id']}}">
                 <img src="{{ url('assets/images')}}/{{$product['gallery']}}" class="product_images" height="320px" class="img-top" alt="image slide">
                 <div class="carousel-caption d-none d-md-block">
                     <h3 class="text-primary">{{$product['name']}}</h3>
                     <p class="text-white">{{$product['description']}}</p>
                 </div>
             </div>
            </a>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
 </div>
        {{-- error message --}}
        <div class=" container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 error-message">
                    @if(Session::has('payment_success'))
                    <div class="alert  text-white" style="background-color:#899da5;">
                        {{Session::get('payment_success')}}
                    </div>
                    @endif
                    @php
                        Session::forget('payment_success')
                    @endphp
                </div>
            </div>
        </div>

     <div class="container-fluid mt-5 trending ">
         <h4 class="text-center text-secondary my-4">Trending Product</h4>
         <div class="row">
             @foreach($products as $product)
             <div class="col-md-3 my-4">
                 <a href="product/{{$product['id']}}">
                     <div class="card shadow rounded" style="background-color: transparent; border-color:rgb(230, 230, 248);">
                        <div class="image-hover">
                          <img class="card-img-top rounded trending-image" height="250px" src="{{ url('assets/images')}}/{{$product['gallery']}}" alt="trending product">
                        </div>
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