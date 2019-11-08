@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="#" >Dashboard</a>
                <span>/</span>
                <span>Payment</span>
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
                                <th class="th-sm">Nama Pemesan</th>
                                <th class="th-sm">No Telp</th>
                                <th class="th-sm">Waktu Tempo Pembayaran</th>
                                <th class="th-sm">Status</th>
                                <th class="th-sm"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($payment as $item)    
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->booking->nama_pemesan}}</td>
                                    <td>{{$item->no_telp}}</td>
                                    <td>{{ date("d F Y", strtotime($item->booking->tanggal_main))}}, {{ date("H:i A", strtotime($item->end_payment))}}</td>
                                    <td>{{$item->status}} <span id="timers"></span></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="/list-payment-detail/{{$item->id}}"><i class="far fa-eye"></i></a>
                                        <a id="catchId" dataId="{{$item->booking->id}}" class="btn btn-danger btn-sm">
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
                            {{ $payment->links() }}
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
                text: "Once deleted, you will not be able to recover this data payment with ID "+id+"??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/list-payment/"+id+"/destroy"
                } else {
                    swal("Deleted data canceled!!");
                }
            });
        })
    </script>
@endsection