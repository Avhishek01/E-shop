@extends('layouts.front')

@section('title')

Order-Items

@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order View</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for=""> First Name </label>
                            <div class="border p-2">{{$orders->fname}}</div>
                            <label for="">Last Name </label>
                            <div class="border p-2">{{$orders->lname}}</div>
                            <label for=""> Email </label>
                            <div class="border p-2">{{$orders->email}}</div>
                            <label for=""> Contact No </label>
                            <div class="border p-2">{{$orders->phone}}</div>
                            <label for=""> Shipping Address </label>
                            <div class="border p-2">
                                {{$orders->address1}},
                                {{$orders->address2}},
                                {{$orders->city}},
                                {{$orders->state}},
                                {{$orders->country}},
                            </div>
                            <label for=""> Zip Code </label>
                            <div class="border p-2">{{$orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $order)
                                    <tr>
                                        <td>{{$order->products->name}}</td>
                                        <td>{{$order->qty}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>
                                            <img src="{{asset('image/product/'.$order->products->prod_image)}}" width="50px" height="50px" alt="">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4> Grand Total: {{$orders->total_price}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection