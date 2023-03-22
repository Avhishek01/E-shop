<div class="sidebar" data-image="../admin/img/sidebar-5.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
    Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                E-Shop
            </a>
        </div>
        <ul class="nav">

            <li>
                <a class="nav-link {{Request::is('users') ? 'active':''}}" href="{{url('users')}}">
                    <i class="material-icons"></i>
                    <p>Users</p>
                </a>
            </li>

            <li>
                <a class="nav-link {{Request::is('orders') ? 'active':''}}" href="{{'/orders'}}">
                    <i class="material-icons"></i>
                    <p>Orders</p>
                </a>
            </li>

            <li>
                <a class="nav-link {{Request::is('categories') ? 'active':''}}" href="{{url('categories')}}">
                    <i class="material-icons"></i>
                    <p>Category</p>
                </a>
            </li>
            <li>
                <a class="nav-link {{Request::is('subcategories') ? 'active':''}}" href="{{url('subcategories')}}">
                    <i class="material-icons"></i>
                    <p>Sub Category</p>
                </a>
            </li>

            <li>
                <a class="nav-link {{Request::is('product') ? 'active':''}}" href="{{url('product')}}">
                    <i class="material-icons"></i>
                    <p>Products</p>
                </a>
            </li>

            <li>
                <a class="nav-link {{Request::is('add-category') ? 'active':''}}" href="{{url('add-category')}}">
                    <i class="material-icons"></i>
                    <p>Add Category</p>
                </a>
            </li>


            <li>
                <a class="nav-link {{Request::is('add-subcategory') ? 'active':''}}" href="{{url('add-subcategory')}}">
                    <i class="material-icons"></i>
                    <p>Add Sub-Category</p>
                </a>
            </li>

            <li>
                <a class="nav-link {{Request::is('add-products') ? 'active':''}}" href="{{url('add-products')}}">
                    <i class="material-icons"></i>
                    <p>Add Products</p>
                </a>
            </li>
        </ul>
    </div>
</div>