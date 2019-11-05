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
                <h1 class="h1 text-center mb-5">PALAD FUTSAL</h1>
                <div class="row wow fadeIn">
                    <div class="col-md-4 mb-4">
                        <img src="img/palad.jpg" class="img-fluid z-depth-1-half" alt="">
                    </div>
                    <div class="col-md-8 mb-4 des">
                        <p>Palad Futsal adalah jaringan sepak bola indoor di Indonesia - beroperasi di daerah Jakarta Pusat - Pulogadung. </p>
                        <p>Filosofi perusahaan adalah menggabungkan tempat olahraga dengan hiburan dalam menyediakan gaya hidup alternartif dan sehat bagi para eksekutif metropolitan dan dewasa muda Indonesia.</p>
                        <p>Palad Futsal termotivasi oleh semangat para pelanggan kami, kami terus berinovasi untuk meningkatkan konsep, acara, dan program kami. Menjadikan kami satu - satunya jaringan Futsal yang dikelola secara profesional dan benar - benar peduli.</p>
                        <hr>
                        <p>
                        <strong>Kami menyambut anda di situs kami, dan berharap dapat melihat anda di tempat kami.</strong>
                        </p>
                        <!-- CTA -->
                        <a href="" class="btn rgba-gradient text-white btn-md">Booking !!
                        <i class="far fa-calendar-alt"></i>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <!--Main layout-->
@endsection