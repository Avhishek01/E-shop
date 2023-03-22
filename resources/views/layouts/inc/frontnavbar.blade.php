<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container">
    <li class="nav-item"id="home1">
      <a class="nav-link active text-white" aria-current="page" href="{{url('/')}}"><i class="fa fa-home"
          aria-hidden="true" ></i>Home</a>
    </li>
  <div class="search-bar" style="margin-left:30px;">
    <form action="{{url('searchproduct')}}" method="POST">
      @csrf
      <div class="input-group mb-3">
        <input type="search" class="form-control" id="search_product" name="product_name" placeholder="Search" aria-label="search" aria-describedby="basic-addon1" style="width: 400px">
        <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
       </div>
    </form>
    
  </div>
    {{-- <a class="navbar-brand text-white" href="{{url('/')}}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> --}}
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">

        <li class="nav-item" >
          <a class="nav-link active text-white" aria-current="page" href="{{url('cat')}}">Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link cart text-white"id="aaa" > <i
              class="fa fa-shopping-cart"></i>
            <span class="cart-basket  align-items-center justify-content-center cart-count"></span>
          </a>
        </li>
        @guest

        @if(Route::has('login'))
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>{{
            __('Login')}}</a>
        </li>

        @endif

        @if(Route::has('register'))
        <li class="nav-item">
          <a class="nav-link text-white" href="{{route('register')}}"><i class="fa-solid fa-registered"></i>{{
            __('Register')}}</a>
        </li>

        @endif

        @else

        <li class="nav-item">
          <a id="" class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('my-orders')}}">My Orders</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
  @php
  $total=0;
  @endphp
  <div class="container position-absolute" style="z-index:2;">
    <div class="shopping-cart" style="display: none">
      @if($minicart ->count() > 0)
      <div class="shopping-cart-header">
      <a href="<?php echo e(url('cart')) ?>"  class="btn btn-sm btn-primary "><i class="fa fa-shopping-cart cart-icon"></i>Cart</a>
      <span class="lighter-text" style="margin-left: 100px">All Products</span>
      </div>
      <!--end shopping-cart-header -->

      <ul class="shopping-cart-items">

        <li class="clearfix">
          @foreach($minicart as $item )
          <img src="{{asset('image/product/'.$item->products->prod_image)}}" 
            class="" width="50px" height="50px"  alt="Image here">
          <span class="item-name">{{$item->products->name}}</span>
          <span class="item-price">$:{{$item->products->selling_price}}</span>
          <span class="item-quantity">Quantity:{{$item->prod_qty}}</span>
          <?php
          $total += $item->products->selling_price * $item->prod_qty;
          ?>
        </li>
        @endforeach
      </ul>
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">{{$total}}</span>
        <a href="<?php echo e(url('checkout')) ?>"  class="button">Checkout</a>
        @else
        <div class="card-body text-center">
            <h2>Your <i class="fa fa-shopping-cart"></i>  Cart is empty</h2>
        </div>
        @endif
    </div>
    <!--end shopping-cart -->
  </div>
  <!--end container -->
 
{{-- <div id="modal-minicart" class="modal fade" tabindex="-1" role="dialog" data-bs-trigger="hover">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
            @php
            $total=0;
            @endphp
          
            <div class="shopping-cart" >
              <div class="shopping-cart-header">
                <center>
                  <h4>All-Products</h4>
                </center>
              </div>
              <!--end shopping-cart-header -->
        
              <ul class="shopping-cart-items">
                  @foreach($minicart as $item )
                  <img src="{{asset('image/product/'.$item->products->prod_image)}}" 
                    class=""  alt="Image here">
                  <span class="item-name">{{$item->products->name}}</span>
                  <span class="item-price">$:{{$item->products->selling_price}}</span>
                  <span class="item-quantity">Quantity:{{$item->prod_qty}}</span>
                  <?php
                  $total += $item->products->selling_price * $item->prod_qty;
                  ?>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="modal-footer"> 
            <span class="lighter-text">Total:</span>
            <span class="main-color-text">{{$total}}</span>
            <a href="{{url('checkout')}}" class="btn btn-primary btn-sm float-end">Checkout</a>
          </div>
      </div>
  </div>
</div> --}}