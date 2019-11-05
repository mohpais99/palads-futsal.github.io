@extends('layouts.app')

@section('css')
    <style type="text/css">
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
            height: 1000px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
            height: 650px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331!important;
            }
        }
    </style>
@stop

@section('content')
    <div class="view full-page-intro" style="background-image: url('img/bg4.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row wow fadeIn">
                    <div class="col-md-6 mb-4 white-text text-center text-md-left">
                        <h1 class="display-4 font-weight-bold">Count Down</h1>
                        <hr class="hr-light">
                        @if ($count_P > 0)    
                            <p>
                                <strong>Silahkan lakukan pembayaran sebelum waktu berakhir !!</strong>
                            </p>
                        @endif
                        <h5 class="mb-4">
                            @if ($count_P > 0)
                                <strong class="text-info" id="timer"></strong>
                            @elseif($payment->status === "Waiting") 
                                <strong class="text-warning" style="font-size: 18px">Status sedang di proses, silahkan lakukan konfirmasi kepada admin sebelum jam {{date("H:i A", strtotime($payment->end_payment))}}</strong>
                            @elseif($payment->status === "Sudah Membayar")
                                <strong class="text-success" style="font-size: 20px">Pembayaran sudah di konfirmasi </strong>
                            @endif
                        </h5>
                        @if ($count_P > 0)
                            <a href="#" class="btn btn-indigo btn-lg" data-toggle="modal" data-target="#upload">Sudah Bayar
                                <i class="far fa-check-circle ml-2"></i>
                            </a>
                        @endif
                    </div>
                    <div class="col-md-6 col-xl-5 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="dark-grey-text text-center">
                                    <strong>Data Payment</strong>
                                </h3>
                                <hr>
                                <div class="md-form">
                                    <i class="fas fa-user prefix grey-text"></i>
                                    <input type="text" class="form-control" value="{{$booking->nama_pemesan}}" readonly>
                                    <label for="form8">Atas Nama</label>
                                </div>
                                <div class="md-form">
                                    <i class="fas fa-calendar-alt prefix grey-text"></i>
                                    <input type="text" class="form-control" value="{{date_format(new DateTime($booking->tanggal_main), "d F Y")}}" readonly>
                                    <label for="form8">Tanggal Main</label>
                                </div>                                
                                <div class="md-form">
                                    <i class="fab fa-paypal prefix grey-text"></i>
                                    <input type="text" class="form-control" value="Rp {{number_format($payment->harga)}}" readonly>
                                    <label for="form8">Jumlah Pembayaran</label>
                                </div>
                                <div class="md-form">
                                    <i class="fab fa-buysellads prefix grey-text"></i>
                                    <input type="text" class="form-control" value="{{$booking->lapangan->nama}}" readonly>
                                    <label for="form8">Lapangan</label>
                                    <img src="img/lapangan/{{$booking->lapangan->foto}}" alt="thumbnail" class="img-thumbnail ml-4" style="width: 200px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.modal')
@stop

@section('js')
    <script>
        if ({{$count_P}} > 0) {
            var id = {{$booking->id}};

            // Set the date we're counting down to
            var countDownDate = new Date("{{$booking->tanggal_main}} {{$payment->end_payment}}").getTime();
            
            // Update the count down every 1 second
            var x = setInterval(function() {
            
                // Get today's date and time
                var now = new Date().getTime();
                    
                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                    
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                // Output the result in an element with id="demo"
                document.getElementById("timer").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";
                    
                // If the count down is over, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    location.href = "http://localhost:8000/payment/"+id+"/expired";
                }
            }, 1000);
        }
    </script>
@endsection