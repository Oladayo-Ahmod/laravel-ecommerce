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
                            <h5 class="card-header">Manage Products</h5>
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
                                                <th class="border-0">Category</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @php
                                                 $count = 1;   
                                                @endphp
                                            @foreach ($products as $product)
                                            <tr class="delete_row">
                                                <td>{{$count++}}</td>
                                                <td>
                                                    <div class="m-r-10"><img src="{{url('assets/images/'.$product['gallery'])}}" alt="product" class="rounded" width="45"></div>
                                                </td>
                                                <td>{{$product['name']}} </td>
                                                <td>{{$product['product_id']}} </td>
                                                <td>{{$product['quantity']}}</td>
                                                <td>{{$product['price']}}</td>
                                                <td>{{$product['category']}}</td>
                                                <td style="display:flex;" class="my-2">
                                                    <a href="/edit-product/{{$product['id']}}">
                                                        <i class="fas fa-edit mr-2 text-primary"></i>
                                                    </a>
                                                    <form action="{{ route('delete.prd') }}" method="post" id="submit">
                                                        @csrf
                                                        <input type="hidden" class="prd_id" name="prd_id" value="{{$product['id']}}">
                                                        <button style="background: none;border:none;" onclick="delete_product(this)" type="button" class="delete_cat" >
                                                        <i class="fas fa-trash mr-2 text-danger"></i>
                                                        </button> 
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center align-items-center">
                                        {{$products->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end manage  products  -->
                     <!-- edit product Modal -->
        <div class="modal fade" id="edit-product" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="/edit-product" class="form-group" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" value="{{$product['name']}}" required name="name">
                            <label for="quantity"> Quantity</label>
                            <input type="number" class="form-control" value="{{$product['quantity']}}" required name="quantity">
                            <label for="price"> Price</label>
                            <input type="number" class="form-control"value="{{$product['price']}}" required name="price">
                            <label for="description">Description</label> <br>
                            <textarea name="description" id="" rows="3" style="width: 100%;">{{$product['description']}}</textarea><br>
                            <label for="category">Category</label>
                            <input type="text" class="form-control" value="{{$product['category']}}" required name="category">
                            <label for="product_id">Product Id</label>
                            <input type="text" class="form-control" value="{{$product['product_id']}}" readonly required name="category">
                            <label for="image">Product Image</label>
                            <div class="row">
                                <div class="col-3 col-lg-3 col-md-4 col-sm-6">
                                    <img class="img-fluid" src="{{url('assets/images/'.$product['gallery'])}}" alt="product image" srcset="">
                                </div>
                            </div>
                            <input type="file" class="form-control" name="image"><br>
                            <input type="hidden" name="main_id" value="{{$product['id']}}">
                            <button type="submit" name="edit-product" class="btn btn-primary btn-sm">Edit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
                   
@endsection