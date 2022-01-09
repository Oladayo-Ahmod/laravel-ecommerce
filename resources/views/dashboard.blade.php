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
                        <div class="container">
                            <div class="row">
                                <!-- ============================================================== -->
                                <!-- sales  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card border-3 border-top border-top-primary">
                                        <div class="card-body">
                                            <h5 class="text-muted">Sales</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">$12099</h1>
                                            </div>
                                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5.86%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end sales  -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- new customer  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card border-3 border-top border-top-primary">
                                        <div class="card-body">
                                            <h5 class="text-muted">New Customer</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">1245</h1>
                                            </div>
                                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end new customer  -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- visitor  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card border-3 border-top border-top-primary">
                                        <div class="card-body">
                                            <h5 class="text-muted">Visitor</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">13000</h1>
                                            </div>
                                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                                <span class="icon-circle-small icon-box-xs text-success bg-success-light"><i class="fa fa-fw fa-arrow-up"></i></span><span class="ml-1">5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end visitor  -->
                                <!-- ============================================================== -->
                                <!-- ============================================================== -->
                                <!-- total orders  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                    <div class="card border-3 border-top border-top-primary">
                                        <div class="card-body">
                                            <h5 class="text-muted">Total Orders</h5>
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1">1340</h1>
                                            </div>
                                            <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                                <span class="icon-circle-small icon-box-xs text-danger bg-danger-light bg-danger-light "><i class="fa fa-fw fa-arrow-down"></i></span><span class="ml-1">4%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end total orders  -->
                                <!-- ============================================================== -->
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- total revenue  -->
                            <!-- ============================================================== -->
  
                            
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- category revenue  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Revenue by Category</h5>
                                    <div class="card-body">
                                        <div id="c3chart_category" style="height: 420px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end category revenue  -->
                            <!-- ============================================================== -->

                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header"> Total Revenue</h5>
                                    <div class="card-body">
                                        <div id="morris_totalrevenue"></div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="display-7 font-weight-bold"><span class="text-primary d-inline-block">$26,000</span><span class="text-success float-right">+9.45%</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
            
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    @endsection