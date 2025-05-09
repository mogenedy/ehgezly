 <style>
        .navbar-nav .nav-link:hover {
            color: #ffffff !important;
        }

        .hero-section {
            background-image: url('{{ asset('user/assets/img/inner-banner/inner-banner3.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 400px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }
    </style>