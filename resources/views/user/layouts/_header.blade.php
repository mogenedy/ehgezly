<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS --> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="assets/fonts/flaticon.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="assets/css/boxicons.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- Owl Carousel Min CSS --> 
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <!-- Nice Select Min CSS --> 
    <link rel="stylesheet" href="assets/css/nice-select.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="assets/css/meanmenu.css">
    <!-- Jquery Ui CSS -->
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="assets/css/theme-dark.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <title>Ehgezly</title>
</head>
<body>

    <!-- PreLoader Start -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-cube-area">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- PreLoader End -->

    <!-- Top Header Start -->
    <header class="top-header top-header-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-2 pr-0">
                    <div class="language-list">
                        <select class="language-list-item">
                            <option>English</option>
                            <option>العربيّة</option>
                            <option>Deutsch</option>
                            <option>Português</option>
                            <option>简体中文</option>
                        </select>	
                    </div>
                </div>

                <div class="col-lg-9 col-md-10">
                    <div class="header-right">
                        <ul>
                            <li>
                                <i class='bx bx-home-alt'></i>
                                <a href="#">123 Virgil A Stanton, Virginia, USA</a>
                            </li>
                            <li class="nav-item dropdown">
                                @if(Auth::check())
                                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="navbarDropdown" role="button"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bx bx-user-circle fs-5"></i>
                                        <span>{{ Auth::user()->name }}</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">الملف الشخصي</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('user.logout') }}" method="POST" class="m-0">
                                                @csrf
                                                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger">
                                                    <i class="bx bx-log-out-circle"></i> تسجيل الخروج
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                @else
                                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('user.login') }}">
                                        <i class="bx bx-log-in fs-5"></i> تسجيل الدخول
                                    </a>
                                @endif
                            </li>
                            
                            <li>
                                <i class='bx bx-phone-call'></i>
                                <a href="tel:+1-(123)-456-7890">+1 (123) 456 7890</a>
                            </li>
                            
                            
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Top Header End -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="index.html" class="logo">
                        <img src="{{asset('user/assets/img/ehgezly.jpg') }}" alt="Logo" width="60" height="40"  >
                        <img src="assets/img/logos/footer-logo3.png" class="logo-two" alt="Logo">
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav nav-three">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light ">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('user/assets/img/ehgezly.jpg') }}" alt="Logo" width="60" height="50"  >
                        <img src="assets/img/logos/footer-logo3.png" class="logo-two" alt="Logo">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Home 
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="index.html" class="nav-link">
                                            Home One  
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-2.html" class="nav-link">
                                            Home Two
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-3.html" class="nav-link">
                                            Home Three
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="about.html" class="nav-link">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Pages 
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="book.html" class="nav-link">
                                            Booking
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="team.html" class="nav-link">
                                            Team
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            FAQ
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="restaurant.html" class="nav-link">
                                            Restaurant
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="reservation.html" class="nav-link">
                                            Reservation
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="gallery.html" class="nav-link">
                                            Gallery
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="testimonials.html" class="nav-link">
                                            Testimonials
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="checkout.html" class="nav-link">
                                            Check out
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="sign-in.html" class="nav-link">
                                            Sign In
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="sign-up.html" class="nav-link">
                                            Sign Up
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="terms-condition.html" class="nav-link">
                                            Terms & Conditions
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="privacy-policy.html" class="nav-link">
                                            Privacy Policy
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="404.html" class="nav-link">
                                            404 page
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="coming-soon.html" class="nav-link">
                                            Coming Soon
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    Services 
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="services-1.html" class="nav-link active">
                                            Services Style One 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="services-2.html" class="nav-link">
                                            Services Style Two 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="service-details.html" class="nav-link">
                                            Service Details 
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Blog
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="blog-1.html" class="nav-link">
                                            Blog Style One 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-2.html" class="nav-link">
                                            Blog Style Two 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-details.html" class="nav-link">
                                            Blog Details 
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Rooms
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="room.html" class="nav-link">
                                            Rooms 
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="room-details.html" class="nav-link">
                                            Room Details 
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">
                                    Contact
                                </a>
                            </li>

                            <li class="nav-item-btn ">
                                <a href="#" class="default-btn btn-bg-one border-radius-5">Book Now</a>
                            </li>
                        </ul>

                        
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <!-- Inner Banner -->
    <div class="inner-banner inner-bg7">
        <div class="container">
            <div class="inner-title">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>Services Style One</li>
                </ul>
                <h3>Services Style One</h3>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->