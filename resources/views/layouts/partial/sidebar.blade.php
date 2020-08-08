<div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          POS/IMS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">

          <li class="">
            <a href="{{ route('home') }}">
              <i class="now-ui-icons education_atom"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="{{ route('product.index') }}">
              <i class="now-ui-icons location_map-big"></i>
              <p>Manage Product</p>
            </a>
          </li>
          <li>
            <a href="{{ route('purchase.index') }}">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Manage Purchase</p>
            </a>
          </li>
          <li>
            <a href="{{ route('supplair.index') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Manage Supplier</p>
            </a>
          </li>
        </ul>
      </div>
