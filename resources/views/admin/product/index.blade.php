@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                        <table class="table">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Product-Model</th>
                            <th>Selling-Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           
                            @foreach($products as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->categories->category_name}}</td>
                                <td>{{$item->subcategories->name}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->selling_price}}
                                    <td>
                                        <img src="{{ url('image/product/'.$item->prod_image) }}" style="height: 100px; width: 100px;">
                                    </td>
                                <td>
                                    <p style="margin-top:30px"><a class="btn btn-sm btn-success" href="{{url('proedit/'.$item->id ) }}">Edit</a></p>
                                    <p style="margin-top:30px"><a class="btn btn-sm btn btn-danger" href="{{url('destroy/'.$item->id ) }}"onclick="return confirm('Are you sure?')">Delete</a></p>
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
@endsection


