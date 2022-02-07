 <!-- ============================================================== -->
 <div class="ecommerce-widget">

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Recent Orders</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$count_orders}}</h1>
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
                    <h5 class="text-muted">Orders Delivered</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$orders_delivered}}</h1>
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
                    <h5 class="text-muted">Orders In Progress</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$orders_inprogress}}</h1>
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
                    <h5 class="text-muted">Orders Cancelled</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{$orders_cancelled}}</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span>-2.00%</span>
                    </div>
                </div>
                <div id="sparkline-revenue4"></div>
            </div>
        </div>
    </div>