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
            <form action="{{ route('pay') }}" role="form" accept-charset="UTF-8" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" readonly class="form-control"  value="" name="first_name">
                        <label for="lastname">Last Name</label>
                        <input type="text" readonly class="form-control" value="oladayo ahmod" name="last_name">
                        <label for="number">Phone</label>
                        <input type="number" class="form-control" name="phone">
                        <label for="address">Address</label>
                        <textarea class="form-control" required name="address" id="" rows="3"></textarea>
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control"> {{-- required --}}
                        <input type="hidden" name="orderID" value="345">
                        <input type="hidden" name="amount" value="{{$total}}"> {{-- required in kobo --}}
                        <input type="hidden" name="quantity" value="3">
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' =>'value','first_name' => 'olamilekan']) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                        {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                    </div>
                    {{-- <div class="form-group">
                        <label for="payment"><b> Payment Method </b></label><br>
                        <div class="form-check">
                          <label class="form-check-label">
                                <input type="checkbox" value="cash"  name="payment" id=""> <span>Online payment</span><br><br>
                                <input type="checkbox" value="cash"  name="payament" id=""> <span>EMI payment</span><br><br>
                                <input type="checkbox" value="cash"  name="payment" id=""> <span>Payment on delivery</span>
                            </label>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary mt-3 btn-sm">Order Now</button>
            </form>
        </div>
    </div>
</div>
@endsection