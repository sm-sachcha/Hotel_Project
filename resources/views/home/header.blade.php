      <header>

      <!-- <style>
.btn-gradient {
    background: linear-gradient(45deg, #4facfe, #00f2fe);
    color: white;
    font-weight: bold;
    border-radius: 12px;
    transition: all 0.3s ease;
    border: none;
}

.btn-gradient:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.2);
    color: white;
}

/* Dropdown item icons */
.dropdown-item i {
    min-width: 20px;
}


      </style> -->

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                                <a href="{{url('/')}}"> <img src="{{ asset('images/Logo.png') }}" alt="Logo"></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">

                                 <li class="nav-item active">
                                 <a class="nav-link" href="/">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="room.html">Our room</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="gallery.html">Gallery</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="blog.html">Blog</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contact Us</a>
                              </li>




<nav style="margin-bottom: 45px;" class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <ul class="navbar-nav ms-auto">

        @if (Route::has('login'))
            @auth
                <li class="nav-item dropdown">
                    <!-- Simple Text with Border -->
                    <span style="border: 1px solid #000; padding: 5px 10px; cursor: pointer; border-radius: 5px;"
                          data-bs-toggle="dropdown"
                          aria-expanded="false">
                        Account
                    </span>

                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu dropdown-menu-end" style="min-width: 180px;">
                        <li>
                            <a class="dropdown-item" href="{{ url('/dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item me-2">
                    <a href="{{ route('login') }}">Login</a>
                </li>

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            @endauth
        @endif

    </ul>
</nav>









                           </div>

                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>