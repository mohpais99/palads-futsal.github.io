<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Palad Sign In</title>
  <link rel="icon" type="image/png" href="/img/iconn.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('css/mdb.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/login/login.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <style>
    html,
    body,
    header,
    .view {
        height: 100%;
        background-image: url('img/bg2.jpg');
    }

    @media (min-width: 560px) and (max-width: 740px) {
        html,
        body,
        header,
        .view {
            height: 650px;
        }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view  {
        height: 650px;
      }
    }
  </style>
</head>

<body class="login-page">
    <!-- Intro Section -->
    <section class="view intro-2">
        <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
                        <!-- Form with header -->
                        <div class="card wow fadeIn" data-wow-delay="0.3s">
                            <div class="card-body">
                                <!-- Header -->
                                <div class="form-header purple-gradient text-center">
                                    <h3 class="font-weight-500 text-white my-2 py-1"><i class="fas fa-sign-in-alt"></i> Sign In</h3>
                                </div>
                                <form action="/post-login" method="POST">
                                    {{csrf_field()}}
                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix white-text"></i>
                                        <input type="text" name="email" class="form-control">
                                        <label for="email">Your email</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fas fa-lock prefix white-text"></i>
                                        <input type="password" name="password" class="form-control">
                                        <label for="password">Your password</label>
                                    </div>
                                    <div class="text-center">
                                    <button type="submit" class="btn purple-gradient btn-lg">Sign In</button>
                                </form>
                                <hr class="mt-4">
                                    <p>Not a member?
                                        <a href="/register">Register</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Form with header -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro Section -->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('error'))
            toastr.error('Something Wrong !!', '{{Session::get('error')}}')
        @endif
    </script>
    <!-- Custom scripts -->
    <script>
        new WOW().init();
    </script>

</body>

</html>
