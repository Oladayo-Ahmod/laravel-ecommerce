@extends('admin-master')
@section('manage_products')
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
            <!-- ============================================================== -->
            <div class="ecommerce-widget">

                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Total Revenue</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">$12099</h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                </div>
                            </div>
                            <div id="sparkline-revenue"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Affiliate Revenue</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">$12099</h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                                </div>
                            </div>
                            <div id="sparkline-revenue2"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Refunds</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">0.00</h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                    <span>N/A</span>
                                </div>
                            </div>
                            <div id="sparkline-revenue3"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-muted">Avg. Revenue Per User</h5>
                                <div class="metric-value d-inline-block">
                                    <h1 class="mb-1">$28000</h1>
                                </div>
                                <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                                    <span>-2.00%</span>
                                </div>
                            </div>
                            <div id="sparkline-revenue4"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- ============================================================== -->
              
                    <!-- ============================================================== -->

                                  <!-- products  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Edit Products</h5>
                                <div class="card-body p-3">
                                    <form action="/update-product" class="form-group" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" value="{{$product['name']}}" required name="name"> <br>
                                        <label for="quantity"> Quantity</label>
                                        <input type="number" class="form-control" value="{{$product['quantity']}}" required name="quantity"> <br>
                                        <label for="price"> Price</label>
                                        <input type="number" class="form-control"value="{{$product['price']}}" required name="price"> <br>
                                        <label for="description">Description</label> <br>
                                        <textarea name="description" id="" rows="3" style="width: 100%;">{{$product['description']}}</textarea><br>
                                        <label for="category">Category</label>
                                        <input type="text" class="form-control" value="{{$product['category']}}" required name="category"> <br>
                                        <label for="product_id">Product Id</label>
                                        <input type="text" class="form-control" value="{{$product['product_id']}}" readonly required name="product_id"> <br>
                                        <label for="image">Product Image</label>
                                        <div class="row">
                                            <div class="col-3 col-lg-3 col-md-4 mb-2 col-sm-6">
                                                <img class="img-fluid" src="{{url('assets/images/'.$product['gallery'])}}" alt="product image" srcset=""> <br>
                                            </div>
                                        </div>
                                        <input type="file" class="form-control" name="image"><br>
                                        <input type="hidden" name="id" value="{{$product['id']}}">
                                        <button type="submit" name="edit-product" class="btn btn-primary">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end edit  products  -->
                    
                   
@endsection