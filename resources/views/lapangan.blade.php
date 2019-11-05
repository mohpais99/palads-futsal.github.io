@extends('layouts.app')
@section('css')
    <style>
        header, .lapangan {
            height: 80vh !important;
        }
    </style>
@stop

@section('content')
    <header>
        <div class="view lapangan" style="background-image: url('/img/bg3.jpg'); background-repeat: no-repeat; background-size: cover;">
          <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
                <div class="col-md-12 mb-4 white-text text-center mt-md-5">
                  <h4 class="display-3 font-weight-bold white-text mb-0">Palad Futsal</h4>
                  <hr class="hr-light my-4 w-75">
                  <h4 class="subtext-header mt-2 mb-4">Bermain futsal jadi lebih gampang di Palad Futsal!!!</h4>
                </div>
          </div>
        </div>
    </header>
    <main class="mt-5 pt-4">
        <div class="container dark-grey-text mt-5">
            <h1 class="h1 text-center mb-5">{{$lapangan->nama}}</h1>
            <hr class="my-5">
            <div class="row wow fadeIn">
                <div class="col-md-6 mb-4">
                    <img src="/img/lapangan/{{$lapangan->foto}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6 mb-4">
                    <div class="p-4">
                        <p class="lead">
                            <strong>Hari Biasa</strong>
                            <span>Rp 65.000 / jam</span>
                        </p>
                        <p class="lead font-weight-bold">Deskripsi</p>
                        <p>Tersedia Lapangan sistesis, jaring penghalang, papan skor otomatis, dan tempat duduk untuk para penonton!</p>
                        <div class="col">
                            <div class="row">
                                {{-- @foreach ($jam as $item)
                                    @if ($booking)    
                                        @foreach ($booking as $look)
                                            @if ($item->time == $look->waktu_mulai)
                                                <h5 class="m-2"><span class="p-2 badge @if ($item->time == $look->waktu_mulai) badge-danger @else badge-success @endif">{{$item->name}}</span></h5>
                                            @endif
                                        @endforeach
                                        @if ($item->time <> $look->waktu_mulai)
                                            <h5 class="m-2"><span class="p-2 badge badge-success">{{$item->name}}</span></h5>
                                        @endif
                                    @endif
                                @endforeach --}}
                                @if ($booking != null)
                                    @foreach ($jam as $item)
                                        <h5 class="m-2"><span class="p-2 badge badge-danger">{{$item->name}}</span></h5>
                                    @endforeach
                                    @foreach ($jam2 as $item2)
                                        <h5 class="m-2"><span class="p-2 badge badge-success">{{$item2->name}}</span></h5>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <br>
                        <a href="/booking" class="btn btn-primary btn-md my-0 p">Booking Now !!
                            <i class="far fa-calendar-alt"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row d-flex justify-content-center wow fadeIn">
                <div class="col-md-6 text-center">
                    <h2 class="my-4 h2">Lapangan Lain</h2>
                </div>
            </div>
            <div class="row wow fadeIn">
                @foreach ($get as $item)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a href="/home/{{$item->slug}}"><img src="/img/lapangan/{{$item->foto}}" class="img-fluid" alt="Lapangan" style="width:100% !important; height: 250px !important"></a>
                        <div class="mt-2 text-center">
                            <a href="/home/{{$item->slug}}" style="color: #000"><h4>{{$item->nama}}</h4></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection