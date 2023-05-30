<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>{{config('app.name')}} | @yield('title')</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" /><span>
              
            </span>
          </a>

          <div class="navbar-collapse" id="">
            <div class="container">
              <div class=" mr-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav justify-content-between ">
                  
                  <div class=" d-none d-lg-flex">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('dashboard')}}"><b>Home</b></a>
                    </li>
                    @if(Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('staff.index')}}"><b>Staff</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.index')}}"><b>Customers</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.index')}}"><b>Categories</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><b>Order</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><b>Logout</b></a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </li>
                    
                  </div>
                </ul>
              </div>
            </div>

            <div class="custom_menu-btn">
              <button onclick="openNav()"></button>
            </div>
            <div id="myNav" class="overlay">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="overlay-content">
                <a class="nav-link" href="{{route('dashboard')}}">Home</a>
                @if(Auth::user()->role == 'Admin')
                    <a class="nav-link" href="{{route('staff.index')}}">Staff</a>
                    <a class="nav-link" href="{{route('customer.index')}}">Customers</a>
                    <a class="nav-link" href="{{route('category.index')}}">Categories</a>
                    <a class="nav-link" href="#">Order</a>
                @endif
                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                    </form>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    
  </div>
    <div class="container">
        @include('sweetalert::alert')
        @yield('content')
    </div>
  

  <script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>

  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>

</html>