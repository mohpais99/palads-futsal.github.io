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
    <div class="view full-page-intro" style="background-image: url('img/bg5.jpg'); background-repeat: no-repeat; background-size: cover;">
        <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row wow fadeIn">
                    <div class="col-md-12 mb-4 text-center text-md-left">
                        <div class="text-center">
                            <h1 class="display-4 white-text font-weight-bold">History</h1>
                        </div>
                        <hr class="hr-light">
                    </div>
                </div>
                <div class="row wow fadeIn">
                    <div class="col-md-8 mb-4 text-center text-md-left">
                        <table id="table" class="table table-hover table-responsive" cellspacing="0" width="100%">
                            <thead class=" blue lighten-1">
                                <tr>
                                    <th class="th-sm text-center">#No</th>
                                    <th class="th-sm text-center">Nama Pemesan</th>
                                    <th class="th-sm text-center">No Telp</th>
                                    <th class="th-sm text-center">Waktu Main</th>
                                    <th class="th-sm text-center">Status</th>
                                    <th class="th-sm text-center">Lapangan</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: #ffff">
                                @if ($count_H > 0)
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($history as $item)
                                        <tr>
                                            <td style="text-align:center; vertical-align:middle;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$item->nama_pemesan}}</td>
                                            <td style="text-align:center; vertical-align:middle;">{{$item->no_telp}}</td>
                                            <td style="text-align:center; vertical-align:middle;">{{ date("d F Y", strtotime($item->tanggal_main)) }}, {{ date("H:i", strtotime($item->waktu_mulai)) }} WIB</td>
                                            <td style="text-align:center; vertical-align:middle;"><span class="badge badge-danger badge-pill">Ended</span></td>
                                            <td style="text-align:center;"><img src="/img/lapangan/{{$item->lapangan->foto}}" alt="Lapangan" width="100"></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" style="text-align:center; vertical-align:middle;">No History</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 mb-4 text-center text-md-left">
                        @if ($count_B > 0)                                    
                            <p id="timer" class="white-text"></p>
                            <ul class="list-group mb-3 z-depth-1">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <p style="font-size: 16px">{{ date("d F Y", strtotime($booking->tanggal_main)) }}, {{ date("H:i", strtotime($booking->waktu_mulai)) }} WIB</p>
                                    <span class="badge {{$booking->getStatus()}} badge-pill" style="font-size: 16px">{{$booking->status}}</span>
                                </li>
                            @else
                                <li class="list-group-item d-flex justify-content-center">
                                    <p style="font-size: 18px">You have no booking!!</p>
                                </li>
                            </ul>
                        @endif
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        @if ($count_B > 0 && $booking->status == 'Incoming')
                var id = {{$booking->id}};

                // Set the date we're counting down to
                var countDownDate = new Date("{{$booking->tanggal_main}} {{$booking->waktu_mulai}}").getTime();
                
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
                    document.getElementById("timer").innerHTML = "You match started in: " + days + "d " + hours + "h "
                    + minutes + "m " + seconds + "s ";

                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        location.href = "http://localhost:8000/history/"+id+"/update";
                    }
                }, 1000);
        @endif
    </script>
    <script>
        @if (!empty($booking) && $booking->status === 'Started')
                var id = {{$booking->id}};

                // Set the date we're counting down to
                var countDownDate = new Date("{{$booking->tanggal_main}} {{$booking->waktu_akhir}}").getTime();
                
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
                    document.getElementById("timer").innerHTML = "Your match will ended in: " + hours + "h "
                    + minutes + "m " + seconds + "s ";

                    // If the count down is over, write some text 
                    if (distance < 0) {
                        clearInterval(x);
                        location.href = "http://localhost:8000/history/"+id+"/delete";
                    }
                }, 1000);
        @endif
    </script>
@endsection
