 <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">
                                    <i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-shopping-cart"></i>Products</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" type="button" data-toggle="modal" data-target="#add-product" style="cursor: pointer">Add
                                                 <span class="badge badge-secondary" >Product</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/manage-products" style="cursor: pointer">Manage Products</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-controls="submenu-2" aria-expanded="false">
                                    <i class="fa fa-fw fa-user-circle"></i>Change Profile Picture <span class="badge badge-success">6</span>
                                </a>
                                <div class="profile-dropdown dropdown-menu mt-0 ">
                                    
                                    <div class="container">
                                        <form action="/profile-picture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="image" class="form-control"><br>
                                            <input type="submit" class="btn btn-primary btn-sm" value="Update">
                                        </form>
                                    </div>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        
        <!-- Modal -->
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
                            <textarea name="description" id="" rows="3" style="width: 100%;"></textarea><br>
                            <label for="category">Category</label>
                            <input type="text" class="form-control" required name="category">
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
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->