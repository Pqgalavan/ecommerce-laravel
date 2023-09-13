<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('admin/assets/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Ecommerce Website
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item  {{Request::is('dashboard') ? 'active' : '';}} ">
          <a class="nav-link" href="{{url('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item  {{Request::is('catogeries') ? 'active' : '';}}">
          <a class="nav-link" href="{{ url('catogeries')}}">
            <i class="material-icons">person</i>
            <p>Add catogeries</p>
          </a>
        </li>

        <li class="nav-item  {{Request::is('view_catogeries') ? 'active' : '';}}">
          <a class="nav-link" href={{url('view_catogeries')}}>
            <i class="material-icons">library_books</i>
            <p>View Catogeries</p>
          </a>
        </li>

        <li class="nav-item  {{Request::is('add_product')}}">
          <a class="nav-link" href="{{url('add_product')}}">
            <i class="material-icons">bubble_chart</i>
            <p>Add Product</p>
          </a>
        </li>
        <li class="nav-item  {{Request::is('get_product') ? 'active' : '';}}">
          <a class="nav-link" href="{{url('get_product')}}">
            <i class="material-icons">location_ons</i>
            <p>View Product</p>
          </a>
        </li>
        <li class="nav-item  {{Request::is('shipping')? 'active' : '' ;}}">
          <a class="nav-link" href="{{url('shipping')}}">
            <i class="material-icons">notifications</i>
            <p>Customer Orders</p>
          </a>
        </li>

          </a>
        </li>
      </ul>
    </div>
