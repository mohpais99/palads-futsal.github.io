@extends('layouts.app')

@section('css')
    <style>
        header, .about {
            height: 80vh !important;
        }

        .des {
            font-size: 18px;
        }
    </style>
@stop

@section('content')
    <header>
        <div class="view about" style="background-image: url('img/10.jpg'); background-repeat: no-repeat; background-size: cover;">
          <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
                <div class="col-md-12 mb-4 white-text text-center mt-md-5 respons">
                  <h4 class="display-3 font-weight-bold white-text mb-0">Palad Futsal</h4>
                  <hr class="hr-light my-4 w-75">
                  <h4 class="subtext-header mt-2 mb-4">Bermain futsal jadi lebih gampang di Palad Futsal!!!</h4>
                </div>
          </div>
        </div>
    </header>

    <!--Main layout-->
    <main class="mt-5">
        <div class="container">
            <section>
                <h1 class="h1 text-center mb-5">MEMBERSHIP</h1>
                <div class="row wow fadeIn">
                    <div class="col-md-4 mb-4">
                        <img src="img/palad.jpg" class="img-fluid z-depth-1-half" alt="">
                    </div>
                    <div class="col-md-8 mb-4 des">
                        <ul class="list-group">
                            <li class="list-group-item active">Keuntungan Menjadi Member Palad Futsal:</li>
                            <li class="list-group-item">1. Mendapatkan diskon potongan harga sebesar 15% per jam</li>
                            <li class="list-group-item">2. Mendapatkan diskon potongan harga sewa sepatu futsal sebesar 10%</li>
                            <li class="list-group-item">3. Bebas parkir kendaraan</li>
                            <li class="list-group-item">4. Gratis 1 botol air minum berukuran 1 setengan liter</li>
                        </ul>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!--Main layout-->
@endsection