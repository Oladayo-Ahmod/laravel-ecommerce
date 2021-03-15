@include('master')
<div class="container mt-3">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4 bg-white shadow p-2 m-2 mt-5" style="border-radius:10px;">
            <div class="">
                <h4 class="text-center text-secondary">Sign up</h4>
                <form class="form-group" enctype="multipart/form-data" method="POST" action="/register">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" required placeholder="" required class="form-control"><br>
                    <label for="email">Email</label>
                    <input type="email" name="email" required class="form-control" id=""><br>
                    <label for="password">Password</label>
                    <input type="password" name="password" required class="form-control"><br>
                    <div style="display:flex;">
                        <button type="submit" class="btn btn-primary mr-auto" name="signup">Sign up</button>
                        <a class="btn btn-danger" href="index.php">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>