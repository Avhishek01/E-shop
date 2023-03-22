@extends('layouts.front')

@section('title')

Welcome to E-shop

@endsection

@section('content')


<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trending Products</h2>
            <div class="owl-carousel fff-carousel owl-theme">
                @foreach($featured_product as $prod)
                <div class="item">
                    <div class="card">
                        <center><img src="{{asset('image/product/'.$prod->prod_image)}}" alt="product image"
                                style="height: 180px; width:280px;margin-top:2px"></center>
                        <div class="card-body">
                            <h5>{{$prod->name}}</h5>
                            <span class="float-start">{{$prod->selling_price}}</span>
                            <span class="float-end"><s>{{$prod->original_price}}</s></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('layouts.inc.slider') 
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>All Category</h2>
            <div class="owl-carousel fff-carousel owl-theme">
               
                @foreach($category as $cate)
              
                <div class="item">
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
 
@endsection

@section('scripts')
<script>
    
</script>

@endsection