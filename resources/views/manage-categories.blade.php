@extends('admin-master')
@section('manage-categories')
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
            @include('layouts/order_details')

              
                <div class="row">
                    <!-- ============================================================== -->
              
                    <!-- ============================================================== -->

                                  <!-- products  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Manage Categories</h5>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Category Name</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @php
                                                 $count = 1;   
                                                @endphp
                                            @foreach ($categories as $category)
                                            <tr class="delete_row">
                                                <td>{{$count++}}</td>
                                                <td>{{$category['name']}} </td>
                                                <td style="display:flex;">
                                                    <a href="/edit-product/{{$category['id']}}">
                                                        <i class="fas fa-edit mr-2 text-primary"></i>
                                                    </a>
                                                    {{-- <a href="/delete-product/{{$category['id']}}">
                                                        <i class="fas fa-trash mr-2 text-danger"></i>
                                                    </a>  --}}
                                                    <form action="{{ route('delete.cat') }}" method="post" id="submit">
                                                        @csrf
                                                        <input type="hidden" class="cat_id" name="cat_id" value="{{$category['id']}}">
                                                        <button style="background: none;border:none;" onclick="delete_cat(this)" type="button" class="delete_cat" >
                                                        <i class="fas fa-trash mr-2 text-danger"></i>
                                                        </button> 
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center align-items-center">
                                        {{-- {{$products->links()}} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end manage  products  -->
                  
                         {{-- add new product modal --}}
        <div class="modal fade" id="add-product" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    
                    <div class="modal-body">
                        <form action="/add-product" class="form-group" method="post" enctype="multipart/form-data">
                            @csrf
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" required name="name">
                            <label for="quantity"> Quantity</label>
                            <input type="number" class="form-control" required name="quantity">
                            <label for="price"> Price</label>
                            <input type="number" class="form-control" required name="price">
                            <label for="description">Description</label> <br>
                            <textarea name="description" class="form-control" id="" rows="3" style="width: 100%;"></textarea><br>
                            <label for="category">Category</label> <br>
                            <select name="category" id="" class="form-control">
                                <option value="">Choose category</option>
                                @foreach ($form_categories as $cat)
                                <option value="{{$cat['name']}}">{{$cat['name']}}</option>
                                @endforeach
                            </select>
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control" name="image"><br>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Add</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
                   
@endsection