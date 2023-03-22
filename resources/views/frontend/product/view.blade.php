@extends('layouts.front')

@section('title')
{{$products->name}}
@endsection

@section('content')
<div class="py-3mb-4shadow-sm bg-warning border-top ">
    <div class="container">
        <h6 class="mb-0">Collections / {{$products->categories->category_name}} / {{$products->subcategories->name}} /{{$products->name}} </h6>
    </div>
</div>
<div class="container">
    <div class="card shadow product_data" style="margin-top: 30px">   
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-light">
                    <img src="{{asset('image/product/'.$products->prod_image)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                    </h2>
                    <hr>
                    <label class="me-3">Original Price : <s>Rs {{$products->original_price}}</s></label>
                    <label class="me-3">Selling Price : Rs {{$products->selling_price}}</label>
                    <p class="mt-3">
                        {!! $products->description !!}
                    </p>
                    <hr>
                    @if($products->qty>0)
                    <label class="badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{$products->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                           
                                <select name="quantity" class="form-control qty-input text-center">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                  </select>
                                {{-- <button class="input-group-text changequantity decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input text-center" />
                                <button class="input-group-text changequantity increment-btn">+</button> --}}
                          
                        </div>
                        <div class="col-md-10">
                            <br/>
                            @if($products->qty>0)
                            <button type="button" class="btn btn-success me-3 float-end addToCartbtn"> Add to cart</button>
                            @else
                            @endif
                            <button type="button" class="btn btn-success me-3 float-start  ">Add to wishlist</button>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function (e){
        $('.addToCartbtn').click(function (e) { 
            e.preventDefault();
            
            var product_id= $(this).closest('.product_data').find('.prod_id').val();
            var product_qty= $(this).closest('.product_data').find('.qty-input').val();
            $.ajaxSetup({
            headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                method:"POST",
                url:"/add-to-cart",
                data:{
                    'product_id':product_id,
                    'product_qty':product_qty,
                },
                success: function(response){
                    window.location.href = "/cart";
                    // alert(response.status);

                }

            })
        });

        $('.increment-btn').click(function(e){
            e.preventDefault();

            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(inc_value,10);
            value = isNaN(value) ? 0 : value;
            if(value<10)
            {
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });


        $('.decrement-btn').click(function(e){
            e.preventDefault();

            var dec_value = $(this).closest('.product_data').find('.qty-input').val();
            var value = parseInt(dec_value,10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

     
    })
</script>
@endsection