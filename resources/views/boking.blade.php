@extends('layouts.app')

@section('css')
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/gijgo.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        header, .about {
            height: 80vh !important;
        }
        .des {
            font-size: 18px;
        }
        #datepicker {
            height: calc(1.5em + 0.75rem + 2px) !important;
            width: 100% !important;
            border: 1px solid #ced4da !important;
            line-height: 1.5 !important;
            padding: 0.375rem 0.75rem !important;
            border-radius: 0.25rem !important;
        }
    </style>
@stop

@section('content')
    <header>
        <div class="view about" style="background-image: url('img/cr.jpg'); background-repeat: no-repeat; background-size: cover;">
            <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
                <div class="col-md-12 mb-4 white-text text-center mt-md-5 respons">
                <h4 class="display-3 font-weight-bold white-text mb-0">Palad Futsal</h4>
                <hr class="hr-light my-4 w-75">
                <h4 class="subtext-header mt-2 mb-4">Ayo Booking Sekarang!!!</h4>
                </div>
            </div>
        </div>
    </header>
    <!--Main layout-->
    <main class="mt-5">
        <div class="container wow fadeIn">
            <h2 class="my-5 h2 text-center">Booking Form</h2>
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="card">
                        <form class="card-body" action="/booking/store" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth()->User()->id}}">
                            <label for="nama">Nama Pemesan</label>
                            <input type="text" name="nama_pemesan" class="form-control mb-2" value="{{Auth()->User()->name}}" placeholder="Isi nama anda..." required>

                            <label for="telp">No Telp Pemesan</label>                  
                            <input type="text" name="no_telp" class="form-control mb-2" maxlength="12" placeholder="Isi nomor yang dapat di hubungi..." required>

                            <label for="email">Email Pemesan</label>
                            <input type="text" name="email" class="form-control mb-2" value="{{Auth()->User()->email}}" placeholder="Isi dengan email valid...">

                            <label for="tanggal">Tanggal Bermain</label>
                            <input id="datepicker" name="tanggal_main" class="mb-2" >

                            <label for="lapangan">Pilih Lapangan</label>
                            <select class="custom-select mb-2" name="lapangan_id" required>
                                <option disabled>Pilih Lapangan</option>
                                @foreach ($lapangan as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>

                            <label for="waktu">Pilih Waktu Bermain</label>
                            <select class="custom-select mb-2" name="waktu_mulai" required>
                                <option value="09:00">09.00</option>
                                <option value="10:00">10.00</option>
                                <option value="11:00">11.00</option>
                                <option value="12:00">12.00</option>
                                <option value="13:00">13.00</option>
                                <option value="14:00">14.00</option>
                                <option value="15:00">15.00</option>
                                <option value="16:00">16.00</option>
                                <option value="17:00">17.00</option>
                                <option value="18:00">18.00</option>
                                <option value="19:00">19.00</option>
                                <option value="20:00">20.00</option>
                                <option value="21:00">21.00</option>
                            </select>

                            <label for="state">Lama Bermain</label>
                            <select class="custom-select" name="lama_bermain">
                                <option value="3600">1 Jam</option>
                                <option value="7200">2 Jam</option>
                                <option value="10800">3 Jam</option>
                            </select>
                            <hr class="mb-4">
                            <button class="btn btn-indigo btn-lg btn-block" type="submit">Booking Now !!</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Your Booking History!!</span>
                    @if ($count > 0)
                        <span class="badge badge-secondary badge-pill">{{$count}}</span>
                    </h4>
                    <ul class="list-group mb-3 z-depth-1">
                        @foreach ($history as $item)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                <h6 class="my-0">{{$item->lapangan->nama}}</h6>
                                <small class="text-muted">{{ date("H:i", strtotime($item->waktu_mulai))}} / {{ date("d F Y", strtotime($item->tanggal_main))}}</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    @else
                    <ul class="list-group mb-3 z-depth-1">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                            <h6 class="my-0">Tidak Ada History</h6>
                            </div>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </main>
@stop

@section('js')
    <script src="{{ asset('js/gijgo.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            var date = new Date();
            var currentMonth = date.getMonth();
            var Month = (date.getMonth()+1);
            if (Month < 10) 
            Month = "0" + Month;
            var currentDate = date.getDate();
            var day = date.getDate();
            if (day < 10) 
            day = "0" + day;
            var currentYear = date.getFullYear();
        
            $('#datepicker').datepicker({
                value: day + '-' + Month + '-' + currentYear,
                minDate: new Date(currentYear, currentMonth, currentDate),
                format: 'dd-mm-yyyy'
            });
        });
    </script>
@endsection