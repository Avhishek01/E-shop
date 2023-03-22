@extends('layouts.front')

@section('title')
{{$subcategory->name}}
@endsection

@section('content')
<div class="py-3mb-4shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{$subcategory->name}} </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>{{$subcategory->name}}</h2>
            <div class="col-md-3 mb-3">
                <div class="row">
                    @foreach($products as $product)
                    <div class="card">
                        <a href="{{url('view-subcategory/'.$subcategory->id.'/'.$product->slug)}}">
                            <center><img src="{{asset('image/product/'.$product->prod_image)}}" alt="product image"
                                    style="height: 180px; width:280px;margin-top:2px"></center>
                            <div class="card-body">
                                <h5>{{$product->name}}</h5>
                                <p>{{$product->description}}</p>
                                <span class="float-start">{{$product->selling_price}}</span>
                                <span class="float-end"><s>{{$product->original_price}}</s></span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
</div>
@endsection