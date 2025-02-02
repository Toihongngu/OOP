 <!-- Navbar Start -->
 <div class="container-fluid mb-5">
     <div class="row border-top px-xl-5">
         <div class="col-lg-3 d-none d-lg-block">
             <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                 data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                 <h6 class="m-0">Categories</h6>
                 <i class="fa fa-angle-down text-dark"></i>
             </a>
             @yield('setting-nav-autodrop')
             <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                 @foreach ($categories as $category)
                     <a href="{{ url('shop?search=&page=1&cate=' . $category['id']) }}"
                         class="nav-item nav-link">{{ $category['name'] }}</a>
                 @endforeach
             </div>
             </nav>
         </div>
         <div class="col-lg-9">
             <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                 <a href="" class="text-decoration-none d-block d-lg-none">
                     <h1 class="m-0 display-5 font-weight-semi-bold"><span
                             class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                 </a>
                 <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                     <div class="navbar-nav mr-auto py-0">
                         <a href="{{ url() }}" class="nav-item nav-link active">Home</a>
                         <a href="{{ url('shop?search=&page=1&cate=0') }}" class="nav-item nav-link">Shop</a>
                         <div class="nav-item dropdown">
                             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                             <div class="dropdown-menu rounded-0 m-0">
                                 <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                             </div>
                         </div>
                         <a href="{{url('contact')}}" class="nav-item nav-link">Contact</a>
                     </div>
                     <div class="navbar-nav ml-auto py-0">
                         @if (!isset($_SESSION['user']))
                             <a href="{{ url('login') }}" class="nav-item nav-link">Login</a>
                             <a href="{{ url('register') }}" class="nav-item nav-link">Register</a>
                         @endif

                         @if (isset($_SESSION['user']) && $_SESSION['user']['type'] == 'admin')
                             <a href="{{ url('admin') }} " class="nav-item nav-link">Trang admin</a>
                         @endif
                         @if (isset($_SESSION['user']))
                             <a href="" class="nav-item nav-link">Chào {{ $_SESSION['user']['name'] }}</a>
                             <a href="{{ url('logout') }}" class="nav-item nav-link">logout</a>
                         @endif
                     </div>
                 </div>
             </nav>
             @yield('nav')
         </div>
     </div>
 </div>
 <!-- Navbar End -->
