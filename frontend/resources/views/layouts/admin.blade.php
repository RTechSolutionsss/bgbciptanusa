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

    <title>{{ config('app.name', 'BGB SYSTEM') }} @yield('title')</title>

    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" />
 
    @stack('addon-style')
    <style>
      @media screen and (max-width: 990px) {
        .sidebar{
          display: none;
        }
      }
      
    </style>
  </head>

  <body>
    
    @include('sweetalert::alert')
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- sidebar -->
        <div class="border-right sidebar" id="sidebar-wrapper">
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
              <a href="{{ route('profile.edit', Auth::id())}}">
                <p class="mt-4" style="font-size: 14px">
                  Hi, {{ Auth::user()->name }}
                </p>
              </a>
            </a>
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ route('home')}}"
              class="list-group-item list-group-item-action {{ (request()->is('dashboard') ? 'active' : '')}}"
            >
              Beranda
            </a>  
            <a href="{{in_array(Auth()->user()->role_id , [1,4]) ? route('url-sales.index') : route('url-sales.show', Auth::id())}}" class="list-group-item list-group-item-action {{ (request()->is('url-sales') ? 'active' : '')}}">BGB</a>            
            @if(Auth::user()->role_id == 1)
            <a
              href="{{ route('katalog.index')}}"
                  class="list-group-item list-group-item-action {{ (request()->is('katalog') ? 'active' : '')}}"
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
                  <a href="{{ route('profile.edit', Auth::id())}}" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('home')}}" class="nav-link d-inline-block {{ (request()->is('dashboard') ? 'active' : '')  }}"> Beranda </a>
                </li>
                <li class="nav-item">
                  <a href="{{in_array(Auth()->user()->role_id , [1,4]) ? route('url-sales.index') : route('url-sales.show', Auth::id())}}" class="nav-link d-inline-block {{ (request()->is("url-sales")) ? 'active' : '' }}"> BGB </a>
                </li>
                <li class="nav-item">
                  @if(Auth::user()->role_id == 1)
                    <a
                      href="{{ route('katalog.index')}}"
                          class="nav-link d-inline-block {{ (request()->is("katalog")) ? 'active' : '' }}"
                        >
                          Katalog
                    </a>
                  @endif
                </li>
                <li class="nav-item">
                  <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    <button class="nav-link d-inline-block ">Sign Out</button>
                  </form>
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
    <script src="{{ url('/js/alert.min.js')}}"></script>

    <script type="text/javascript" src="{{ url('js/datatables.min.js')}}"></script>   
    <script src="{{url('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/datatables2.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
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
