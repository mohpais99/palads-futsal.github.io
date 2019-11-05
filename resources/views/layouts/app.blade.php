<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="/img/iconn.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Palad Futsal</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar rgba-gradient">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/img/logo2.png" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="basicExampleNav">
                <ul class="navbar-nav mr-auto smooth-scroll">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/event">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#contact">Contact</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/event">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/gallery">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/booking">Booking</a>
                        </li>
                        @if (Auth()->user()->getpay() > 0)    
                            <li class="nav-item">
                                <a class="nav-link" href="/payment">Payment</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="">Member</a>
                        </li>
                    @endguest
                </ul>

                @guest
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="/login" class="nav-link"><i class="fas fa-sign-in-alt"></i> Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link"><i class="fas fa-user-plus"></i> Sign Up</i></a>
                        </li>
                    </ul>
                @else 
                    <div class="dropdown" style="color: #fff;">
                        <a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth()->User()->name}}</a>
                        
                        <div class="dropdown-menu dropdown-primary bg-info">
                            @if (Auth()->user()->getHistory() > 0)
                                <a class="dropdown-item" href="/history">History</a>
                            @endif
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">Logout</a>
                            </div>
                        </div>
                    </div>
                @endguest
            </div>

        </div>
    </nav>

    <!-- main -->
    @yield('content')

    <!-- Footer -->
    <footer class="page-footer font-small rgba-gradient">
        <div class="primary-color">
            <div class="container">
                <div class="row py-4 d-flex align-items-center">
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
                    </div>

                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <!--Facebook-->
                        <a class="fb-ic ml-0">
                            <i class="fab fa-facebook white-text mr-4"> </i>
                        </a>
                        <!--Twitter-->
                        <a class="tw-ic">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram white-text mr-lg-4"> </i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">
                <div class="col-md-9 col-lg-9 col-xl-3 mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Palad Futsal</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>Palad Futsal adalah jaringan sepak bola indoor di Indonesia - beroperasi di daerah Jakarta Pusat - Pulogadung.</p>
                </div>

                <div class="col-md-3 col-lg-3 col-xl-3">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong>Contact</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p><i class="fas fa-home mr-3"></i> Jl. Palad No.03, Pulo Gadung</p>
                    <p><i class="fa fa-phone mr-3"></i> +62 821 2267 4696</p>
                </div>
            </div>
        </div>
        <!--/.Footer Links-->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2018 Copyright
            <a href=""> Palads-Futsal.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.success(':)', '{{Session::get('success')}}')
        @endif
        @if (Session::has('error'))
            toastr.error('{{Session::get('error')}}', 'Something Wrong !!', {
                timeOut: 5000
            })
        @endif

        $(function () {
            $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
        });
    </script>
    @yield('js')
</body>
</html>
