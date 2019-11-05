@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <span>{{$user->name}}</span><br>
                @if ($user->member === '0')
                    <a href="/user/{{$user->id}}/update" class="btn btn-sm btn-primary">Jadikan Member!</a>
                @endif
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
                                <th class="th-sm">Tanggal Bermain</th>
                                <th class="th-sm">Total Pembayaran</th>
                                <th class="th-sm">Lapangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($history as $item)    
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_pemesan}}</td>
                                    <td>{{$item->no_telp}}</td>
                                    <td>{{ date("d F Y", strtotime($item->tanggal_main))}}</td>
                                    <td>Rp {{number_format($item->harga)}}</td>
                                    <td><img src="/img/lapangan/{{$item->lapangan->foto}}" alt="Lapangan" width="120"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pg-blue">
                            {{ $history->links() }}
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
                    window.location = "/list-payment/"+id+"/destroy"
                } else {
                    swal("Deleted data canceled!!");
                }
            });
        })
    </script>
@endsection