@extends('admin.layouts.app')

@section('css')
    <style>
        .cont .btn-warning {
            position: absolute;
            top: 45%;
            left: 10%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

        .myImg {
            width: 100%;
            height: 280px !important;
        }

        .cont .btn-danger {
            position: absolute;
            top: 60%;
            left: 10%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

        
        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .myImg {
                width: 100%;
                height: 180px !important; 
            }
        }
    </style>    
@endsection

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/admin" >Dashboard</a>
                <span>/</span>
                <span>Event</span>
            </h4>
            <a class="btn btn-sm btn-primary d-flex justify-content-center" href="/add-event" style="font-size: 16px">+</a>
        </div>
    </div>

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="row text-center text-lg-left cont">
                        @foreach ($event as $item)    
                            <div class="col-lg-3 col-md-4 col-6 mb-3">
                                <img class="img-fluid img-thumbnail myImg" src="/img/event/{{$item->gambar}}">
                                <a href="/event/{{$item->slug}}" class="btn btn-sm btn-warning"><i class="far fa-eye"></i></a>
                                <a class="btn btn-sm btn-danger" id="catchId" dataId="{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pg-blue">
                            {{ $event->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#catchId[dataId]').click(function() {
            var id = $(this).attr('dataId');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data booking with ID "+id+"??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/event/"+id+"/destroy"
                } else {
                    swal("Deleted data canceled!!");
                }
            });
        })
    </script>
@endsection
