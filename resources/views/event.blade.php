@extends('layouts.app')

@section('css')
    <style>
        header, .about {
            height: 80vh !important;
        }

        .des {
            font-size: 18px;
        }

        .calm img {
            height: 400px !important;
        }
    </style>
@stop

@section('content')
    <header>
        <div class="view about" style="background-image: url('img/neymar.jpg'); background-repeat: no-repeat; background-size: cover;">
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
            <section class="text-center">
                <div class="row">
                    @foreach ($event as $item)
                        <div class="col-lg-4 col-md-12 mb-3">
                            <div class="calm z-depth-1-half">
                                <img src="img/event/{{$item->gambar}}" class="img-fluid" alt="Event">
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalPopUp{{$item->id}}">see details...</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <div class="card-body d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pg-blue">
                        {{ $event->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    @include('inc.eventPopUp')
@endsection