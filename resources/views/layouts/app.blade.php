@include('layouts.partial.header')

<body class="">
  <div class="wrapper ">
  @include('layouts.partial.sidebar')
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      @include('layouts.partial.navbar')
      <!-- End Navbar -->

   @yield('content')
      @include('layouts.partial.footer')
