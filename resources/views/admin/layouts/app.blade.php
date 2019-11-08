<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Palads - CPanel</title>
  <link rel="icon" type="image/png" href="/img/iconn.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  @yield('css')
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('cssadmin/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('cssadmin/css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('cssadmin/css/style.min.css')}}" rel="stylesheet">
  <link href="{{ asset('cssadmin/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <style>

    .map-container{
      overflow:hidden;
      padding-bottom:56.25%;
      position:relative;
      height:0;
      }
      .map-container iframe{
      left:0;
      top:0;
      height:100%;
      width:100%;
      position:absolute;
    }
  </style>
</head>

<body class="grey lighten-3">
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">
            <a class="navbar-brand waves-effect " href="/admin">
                <img src="/img/logo2.png" class="img-fluid " alt="" width="100px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Data</a>

                        <div class="dropdown-menu dropdown-secondary">
                          <a class="dropdown-item" href="/list-lapangan">Data Lapangan</a>
                          <a class="dropdown-item" href="/list-booking">Data Booking</a>
                          <a class="dropdown-item" href="/list-payment">Data Pembayaran</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link waves-effect dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Media</a>

                        <div class="dropdown-menu dropdown-secondary">
                          <a class="dropdown-item" href="/list-gallery">Gallery</a>
                          <a class="dropdown-item" href="/list-event">Event</a>
                        </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link waves-effect" href="/list-history">Riwayat</a>
                    </li>
                </ul>

                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item d-none d-sm-block d-md-block d-lg-block">
                        <a href="#" class="nav-link waves-effect">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-block d-md-block d-lg-block">
                        <a href="" class="nav-link waves-effect">
                          <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-block d-md-block d-lg-block">
                        <a href="" class="nav-link waves-effect">
                          <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item avatar dropdown show">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown">
                            <img src="/img/rama.jpg" class="rounded-circle z-depth-0" alt="avatar image" width="32"> {{Auth()->User()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                            <a class="dropdown-item waves-effect waves-light" href="/logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">
        <a class="logo-wrapper waves-effect">
            <img src="/img/logo2.png" class="img-fluid" alt="">
        </a>

        <div class="list-group list-group-flush">
            <a href="/admin" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-chart-pie mr-3"></i>Dashboard
            </a>
            <a href="/list-user" class="list-group-item list-group-item-action waves-effect">
              <i class="fa fa-user mr-3"></i>Pelanggan
            </a>
            <a href="/list-booking" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-table mr-3"></i>Booking
            </a>
            <a href="/list-payment" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-money-bill-alt mr-3"></i>Pembayaran
            </a>
            <a href="/list-history" class="list-group-item list-group-item-action waves-effect">
              <i class="fas fa-history mr-3"></i>Riwayat
            </a>
            <a href="/list-message" class="list-group-item list-group-item-action waves-effect">
              <i class="fas fa-envelope mr-3"></i>Message
            </a>
        </div>
    </div>
  </header>


  <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            @yield('content')
        </div>
    </main>


  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">
    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
        <a href="#">
          <i class="fab fa-facebook-f mr-3"></i>
        </a>

        <a href="#">
          <i class="fab fa-instagram mr-3"></i>
        </a>

        <a href="#">
            <i class="fab fa-twitter mr-3"></i>
          </a>
    </div>

    <div class="footer-copyright py-3">
      © 2019 Copyright:
      <a href="#"> palad-futsal.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{ asset('cssadmin/js/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('cssadmin/js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('cssadmin/js/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('cssadmin/js/mdb.min.js')}}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  @yield('js')
  <script>
      @if (Session::has('success'))
          toastr.success(':)', '{{Session::get('success')}}')
      @endif
  </script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>

  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });


    //line
    var ctxL = document.getElementById("lineChart").getContext('2d');
    var myLineChart = new Chart(ctxL, {
      type: 'line',
      data: {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [{
            label: "My First dataset",
            backgroundColor: [
              'rgba(105, 0, 132, .2)',
            ],
            borderColor: [
              'rgba(200, 99, 132, .7)',
            ],
            borderWidth: 2,
            data: [65, 59, 80, 81, 56, 55, 40]
          },
          {
            label: "My Second dataset",
            backgroundColor: [
              'rgba(0, 137, 132, .2)',
            ],
            borderColor: [
              'rgba(0, 10, 130, .7)',
            ],
            data: [28, 48, 40, 19, 86, 27, 90]
          }
        ]
      },
      options: {
        responsive: true
      }
    });

    //radar
    var ctxR = document.getElementById("radarChart").getContext('2d');
    var myRadarChart = new Chart(ctxR, {
      type: 'radar',
      data: {
        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        datasets: [{
          label: "My First dataset",
          data: [65, 59, 90, 81, 56, 55, 40],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        }, {
          label: "My Second dataset",
          data: [28, 48, 40, 19, 96, 27, 100],
          backgroundColor: [
            'rgba(0, 250, 220, .2)',
          ],
          borderColor: [
            'rgba(0, 213, 132, .7)',
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true
      }
    });

    //doughnut
    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    var myLineChart = new Chart(ctxD, {
      type: 'doughnut',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true
      }
    });

  </script>

</body>

</html>
