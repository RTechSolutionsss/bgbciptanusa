<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" /><link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
 
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <a
              href=""
              class="nav-link"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
            >
              <img
                src="/images/user_pc.png"
                alt=""
                class="rounded-circle mr-2 profile-picture w-75"
              />
              <p class="mt-4" style="font-size: 14px">
                Hi, {{ Auth::user()->name }}
              </p>
            </a>
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ route('home')}}"
              class="list-group-item list-group-item-action"
            >
              Beranda
            </a>  
            <a href="{{Auth::user()->role_id == 1 ? route('url-sales.index') : route('url-sales.show', '1')}}" class="list-group-item list-group-item-action">BGB</a>            
            @if(Auth::user()->role_id == 1)
            <a
              href="{{ route('katalog.index')}}"
                  class="list-group-item list-group-item-action {{ (request()->is("admin/category*")) ? 'active' : '' }}"
                >
                  Katalog
            </a>
            @endif
            <form action="{{ route('logout')}}" method="POST">
              @csrf
              <button class="list-group-item list-group-item-action">Sign Out</button>
          </form>
          </div>
        </div>
        <!-- Page Content -->
        <div id="page-content-wrapper">
        <nav
          class="navbar navbar-store navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
          data-aos="fade-down"
        >
          <div class="container-fluid">
            <button
              class="btn btn-secondary d-md-none mr-auto mr-2"
              id="menu-toggle"
            >
              &laquo; Menu
            </button>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <!-- mobile -->
              <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                  <a href="#" class="nav-link"> Hi,Angga </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link d-inline-block"> Cart </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        {{-- Content --}}
        @yield('content')
      </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>   
    <script src="{{url('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
