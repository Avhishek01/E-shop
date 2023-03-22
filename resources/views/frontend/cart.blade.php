@extends('layouts.front')

@section('title')

My cart

@endsection

@section('content')

<div class="container">
    <div class="card shadow cart-modal" style="margin-top: 10px">
        @if($cartitems->count() > 0)
        <div class="card-body">
            @php
            $total=0;
            @endphp
            @foreach($cartitems as $item )
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('image/product/'.$item->products->prod_image)}}" height="70px" width="70px"  class="img-fluid img-thumbnail"
                        alt="Image here">
                </div>
                <div class="col-md-2">
                    <h3>{{$item->products->name}}</h3>
                </div>
                <div class="col-md-3">
                    <h3>Rs {{$item->products->selling_price}}</h3>
                </div>
                <div class="col-md-2">
                    <input type="hidden" class="prod_id" value="{{$item->id}}">          

                    <label for="Quantity"><h4>Quantity</h4></label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <button class="input-group-text changequantity decrement-btn decrease">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center"
                            value="{{$item->prod_qty}}">
                        <button class="input-group-text changequantity increment-btn">+</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-danger delete-cart"><i class="fa fa-trash"></i>Remove</button>
                </div>
            </div>
            @php
            $total += $item->products->selling_price * $item->prod_qty;
            @endphp
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price: Rs {{$total}}
                <a href="{{url('checkout')}}" class="btn btn-success float-end">Proceed To Checkout</a>
            </h6>

        </div>
        @else
        <div class="card-body text-center">
            <h2>Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
            <a href="{{url('/')}}" class="btn btn-outline-primary float-end"> Continue Shopping</a>
        </div>
        @endif
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
                    loadcart();
                    alert("Item quantity has been added in cart");
                   
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
            if(value == 1){
                $(".decrement-btn").disabled=true;
            }
        });


        $('.delete-cart').click(function (e) { 
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            $.ajaxSetup({
            headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                type: "POST",
                url: "delete-cart-item",
                data: {
                    'prod_id':prod_id,
                },
                success: function (response) {
                    window.location.reload();
                    swal("",response.status,"success");
                }
            });
        });
        
       
        $('.changequantity').click(function (e) { 
            e.preventDefault();
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
           
            var qty = $(this).closest('.product_data').find('.qty-input').val();
            $.ajaxSetup({
            headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

           data = {
                'prod_id':prod_id,
                'prod_qty':qty,
           }
            $.ajax({
                type: "POST",
                url: "update-cart",
                data:data,
                success: function (response) {
                    if(qty == 1){
                        // alert("You cannot remove 1 quantity");
                    }else
                    {
                        alert("Item has been updated");
                    }
                    
                    window.location.reload();


                }
            });
        });
        
        if({{$item->prod_qty}} == 1){
            $(".decrease").hide();
        }
       
    })
</script>
@endsection