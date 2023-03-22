@extends('layouts.front')

@section('title')

{{$category->category_name}}

@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <h2>Subcategory</h2>
        <div class="col-md-3 mb-3">
            @foreach($subcategory as $subcate)
            <a href="{{ url('view-subcategory/'.$subcate->id) }}">
                <div class="card">
                    <center><img src="{{asset('image/subcategory/'.$subcate->image)}}" alt="product image"
                            style="height: 180px; width:280px;margin-top:2px"></center>
                    <div class="card-body">
                        <h5>{{$subcate->name}}</h5>
                        {{-- <span class="float-start">{{$prod->selling_price}}</span>
                        <span class="float-end"><s>{{$prod->original_price}}</s></span> --}}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection