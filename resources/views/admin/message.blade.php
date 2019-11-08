@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/admin" >Dashboard</a>
                <span>/</span>
                <span>Message</span>
            </h4>
        </div>
    </div>

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="table" class="table table-hover" cellspacing="0" width="100%">
                        <thead class=" blue lighten-1">
                            <tr>
                                <th class="th-sm">No</th>
                                <th class="th-sm">Nama Pengirim</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Subjek</th>
                                <th class="th-sm">message</th>
                                <th class="th-sm"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($message as $item)    
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->subject}}</td>
                                    <td>{{$item->message}}</td>
                                    <td>
                                        <a id="catchId" dataId="{{$item->id}}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pg-blue">
                            {{ $message->links() }}
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
                text: "Once deleted, you will not be able to recover this data message with ID "+id+"??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/message/"+id+"/delete"
                } else {
                    swal("Deleted data canceled!!");
                }
            });
        })
    </script>
@endsection