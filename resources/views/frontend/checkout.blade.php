@extends('layouts.front')

@section('title')

Checkout Page

@endsection

@section('content')
<div class="container mt-3">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <form action="{{url('place-order')}}" method="POST">
      @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="firstname">First Name</label>
                                    <input type="text" class="form-control" name="fname" value="{{ Auth::user()->name }}" placeholder="Enter First Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="firstname">Last Name</label>
                                    <input type="text" class="form-control" name="lname" value="{{ Auth::user()->lname }}" placeholder="Enter Last Name">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" placeholder="Enter Email">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}" placeholder="Enter Phone Number">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">Address 1</label>
                                    <input type="text" class="form-control" name="address1" value="{{ Auth::user()->address1 }}" placeholder="Enter Address 1">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">Address 2</label>
                                    <input type="text" class="form-control" name="address2" value="{{ Auth::user()->address2 }}" placeholder="Enter Address 2">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">City</label>
                                    <input type="text" class="form-control" name="city" value="{{ Auth::user()->city }}" placeholder="Enter City">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">Country</label>
                                    <input type="text" class="form-control" name="country" value="{{ Auth::user()->country }}" placeholder="Enter Country">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">State</label>
                                    <input type="text" class="form-control" name="state" value="{{ Auth::user()->state }}" placeholder="Enter State">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="firstname">Pin Code</label>
                                    <input type="text" class="form-control" name="pincode" value="{{ Auth::user()->pincode }}" placeholder="Enter Pin Code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                        <h6> Order Details</h6>
                        <hr>
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($cartitems as $item)
                                <tr>
                                    <td>{{$item->products->name}}</td>
                                    <td>{{$item->prod_qty}}</td>
                                    <td>{{ $item->products->selling_price * $item->prod_qty}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary float-end" onclick="submitForm()">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>
@endsection
@section('scripts')
<script>
    function submitForm() {
      alert("Order has been placed");
    //   window.open("/");
    }
  </script>
@endsection