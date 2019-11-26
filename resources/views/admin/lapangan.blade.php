@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/admin" target="_blank">Dashboard</a>
                <span>/</span>
                <span>Lapangan</span>
            </h4>

            <div class="d-flex justify-content-center">
                <button class="btn btn-primary btn-sm my-0 p" type="submit" data-toggle="modal" data-target="#modalLRFormDemo">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body table-responsive ">
                    <table id="table" class="table table-hover" cellspacing="0" width="100%">
                        <thead class=" blue lighten-1">
                            <tr>
                                <th class="th-sm">No</th>
                                <th>Foto</th>
                                <th></th>
                                <th>Nama Lapangan</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($lapangan as $item)    
                            <tr>
                                <th style="width:5px !impormant">{{$no++}}</th>
                                <td colspan="2" class="align-middle"><img src="/img/lapangan/{{$item->foto}}" alt="Lapangan" style="width: 200px; height:140px"></td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->deskripsi}}</td>
                                <td>
                                    <a href="/lapangan/{{$item->slug}}" class="btn btn-warning btn-sm"><i class="far fa-eye"></i></a>
                                    <a class="btn btn-danger btn-sm" id="catchId" dataId="{{$item->id}}"><i class="fas fa-trash-alt"></i></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.inc.addLapangan')
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
                    window.location = "/lapangan/"+id+"/destroy"
                } else {
                    swal("Deleted data canceled!!");
                }
            });
        })
    </script>
@endsection