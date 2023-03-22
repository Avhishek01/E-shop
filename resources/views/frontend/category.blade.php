@extends('layouts.front')

@section('title')

Category

@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center>
                    <h2>All Categories</h2><br>
                    <div class="row">
                        @foreach($category as $cate)
                        <div class="col-md-4 mb-3">
                            <a href="{{ url('view-category/'.$cate->id) }}">
                                <div class="card">
                                    <center><img src="{{asset('image/category/'.$cate->image)}}" alt="product image"
                                            style="height: 180px; width:280px;margin-top:2px"></center>
                                    <div class="card-body">
                                        <h5>{{$cate->category_name}}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection