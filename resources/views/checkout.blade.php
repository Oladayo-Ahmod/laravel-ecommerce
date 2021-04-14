@extends('master')
@section('content')
<div class="container cartlist mt-3">
    <h3>Check Out</h3>
    <div class="row">
        <div class="col-md-9">
            <table class="table table-striped table-inverse table-responsive">
                <thead class="">
                    <tr>
                        <th>Amount</th>
                        <th>Tax</th>
                        <th>Delivery</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">{{$total}}</td>
                            <td>$10</td>
                            <td>0</td>
                            <td>{{$total+10}}</td>
                        </tr>
                    </tbody>
            </table>
            <form action="/ordernow" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="address">Your Address</label>
                        <textarea class="form-control" required name="address" id="" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="payment"><b> Payment Method </b></label><br>
                        <div class="form-check">
                          <label class="form-check-label">
                                <input type="checkbox" value="cash"  name="payment" id=""> <span>Online payment</span><br><br>
                                <input type="checkbox" value="cash"  name="payament" id=""> <span>EMI payment</span><br><br>
                                <input type="checkbox" value="cash"  name="payment" id=""> <span>Payment on delivery</span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 btn-sm">Order Now</button>
            </form>
        </div>
    </div>
</div>
@endsection