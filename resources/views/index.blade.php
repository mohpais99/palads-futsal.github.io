@extends('layouts.app')

@section('content')
    <header>
        <div class="view" style="background-image: url('img/bg.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
                <div class="col-md-12 mb-4 white-text text-center ">
                    <h4 class="display-3 font-weight-bold white-text mb-0">Palad Futsal</h4>
                    <hr class="hr-light my-4 w-75">
                    <h4 class="subtext-header mt-2 mb-4">Bermain futsal jadi lebih gampang di Palad Futsal !!!</h4>
                    <a href="/booking" type="button" class="btn btn-rounded btn-outline-white" >
                        Booking Now !!!
                    </a>
                </div>
            </div>
        </div>
    </header>
    <main class="mt-5">
        <div class="container">
            <section class="pt-4">
                <div class="wow fadeIn">
                    <h2 class="h1 text-center mb-5">Lapangan</h2>
                </div>
                <hr class="mb-5">
                @foreach ($items as $item)
                    <div class="row wow fadeIn">
                        <div class="col-lg-5 col-xl-4 mb-4">
                            <div class="rounded z-depth-1">
                                <img src="img/lapangan/{{$item->foto}}" class="img-fluid" alt="">
                                <a href="/home/{{$item->slug}}">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                            <h3 class="mb-3 font-weight-bold dark-grey-text">
                                <strong>{{$item->nama}}</strong>
                            </h3>
                            <p class="grey-text">{{$item->deskripsi}}</p>
                            <a href="/home/{{$item->slug}}" class="btn btn-primary btn-md">Lihat Lapangan
                            </a>
                        </div>
                    </div>
                @endforeach
            </section>

            <hr class="my-5">
            <section id="contact">
                <h2 class="mb-5 font-weight-bold text-center">Contact Us</h2>
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <form class="p-5 grey-text" action="/message" method="POST">
                            @csrf
                            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
                                <input type="text" name="name" class="form-control form-control-sm">
                                <label>Your name</label>
                            </div>
                            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
                                <input type="text" name="email" class="form-control form-control-sm">
                                <label>Your email</label>
                            </div>
                            <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
                                <input type="text" name="subject" class="form-control form-control-sm">
                                <label>Subject</label>
                            </div>
                            <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
                                <textarea type="text" name="message" class="md-textarea form-control form-control-sm" rows="4"></textarea>
                                <label>Your message</label>
                            </div>
                            <div class="text-center mt-4">
                                <button class="btn btn-primary" type="submit">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="row text-center">
                            <div class="col-lg-4 col-md-12 mb-3">
                                <p><i class="fa fa-map fa-1x mr-2 grey-text"></i>Jl. Palad No.03, Pulo Gadung</p>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-3">
                                <p><i class="fa fa-building fa-1x mr-2 grey-text"></i>Senin - Minggu, 09:00-22:00</p>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-3">
                                <p><i class="fa fa-phone fa-1x mr-2 grey-text"></i>+62 821 2267 4696</p>
                            </div>
                        </div>
                        <div id="map-container" class="z-depth-1-half map-container mb-5" style="height: 400px">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5927909475668!2d106.90136196401558!3d-6.1852147455221616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4ce7c85fda1%3A0x22e7b0ad2cc6ea42!2sFutsal+Palad+1!5e0!3m2!1sid!2sid!4v1540031854835" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection