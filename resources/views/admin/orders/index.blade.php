@extends('layouts.admin')

@section('title')
Order-List
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4> New Orders </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Order Date</th>
                                    <th>Tracking Number</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ date('d-m-Y',strtotime($order->created_at))}}</td>
                                    <td>{{$order->tracking_no}}</td>
                                    <td>{{$order->total_price}}</td>
                                    <td>{{$order->status == '0' ? 'pending' : 'completed'}}</td>
                                    <td>
                                        <a href="{{url('admin/view-orders/'.$order->id)}}" class="btn btn-primary">View</a>
                                        {{-- <a class="btn btn-sm btn btn-danger" href="{{url('destroy/'.$order->id ) }}"onclick="return confirm('Are you sure?')">Delete</a> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection