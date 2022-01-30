@extends('admin-master')
        @section('dashboard')
                <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">E-commerce Dashboard  </h2>
                                @if (Session::has('success'))
                                   <div class="alert alert-success mt-4">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                @php
                                 Session::forget('success') 
                                @endphp
                                @if(Session::has('error'))
                                    <div class="alert alert-danger mt-4">
                                        {{Session::get('error')}}
                                    </div>
                                @endif
                                @php
                                    Session::forget('error')
                                @endphp
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                        @include('layouts/order_details')
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Recent Orders</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Product Name</th>
                                                        <th class="border-0">Product Id</th>
                                                        <th class="border-0">Quantity</th>
                                                        <th class="border-0">Price</th>
                                                        <th class="border-0">Order Time</th>
                                                        <th class="border-0">Customer</th>
                                                        <th class="border-0">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $count = 1;
                                                    @endphp
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$count++}}</td>
                                                        <td>
                                                            <div class="m-r-10"><img src="assets/images/{{$order->gallery}}" alt="user" class="rounded" width="45"></div>
                                                        </td>
                                                        <td>{{$order->name}} </td>
                                                        <td>{{$order->product_id}}</td>
                                                        <td>1</td>
                                                        <td>{{$order->price}}</td>
                                                        <td>{{$order->created_at}}</td>
                                                        <td>{{$order->first_name}} {{$order->last_name}} </td>
                                                        <td><span class="badge-dot  mr-1 @if($order->delivery_status == 'in progress') {{'badge-brand'}}
                                                             @elseif($order->delivery_status == 'delivered') {{'badge-success'}} @else {{'badge-danger'}} @endif "></span>{{$order->delivery_status}} </td>
                                                    </tr>
                                                    
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->
                       
                     
                        
            
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    @endsection