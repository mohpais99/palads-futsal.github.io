@extends('admin.layouts.app')

@section('css')
    <style>
        #imgPop {
            height: 80% !important;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }
        
        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        
        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }
        
        /* Add Animation */
        .modal-content, #caption {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }
        
        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
        }
        
        @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
        }
        
        
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        
        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
            width: 100%;
            }
        }
    </style>    
@stop

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="#" >Dashboard</a>
                <span>/</span>
                <span>History</span>
            </h4>

            <form action="/find-history" class="d-flex justify-content-center" method="GET">
                @csrf
                <input type="search" placeholder="Cari nama pemesan ..." name="search" class="form-control">
                <button class="btn btn-primary btn-sm my-0 p" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
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
                                <th class="th-sm">Lapangan</th>
                                <th class="th-sm">No Telp</th>
                                <th class="th-sm">Harga</th>
                                <th class="th-sm">Waktu Main</th>
                                <th class="th-sm">Bukti Pembayaran</th>
                                <th class="th-sm"></th>
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
                                <td>{{$item->lapangan->nama}}</td>
                                <td>{{$item->no_telp}}</td>
                                <td>Rp {{number_format($item->harga)}}</td>
                                <td>{{ date("d F Y", strtotime($item->tanggal_main))}}, {{ date("H:i A", strtotime($item->waktu_mulai))}}</td>
                                <td><img id="myImg{{$item->id}}" src="/img/upload/{{$item->struk}}" alt="struk" width="80"></td>
                                <td>
                                    <a id="catchId" dataId="{{$item->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
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
    @include('admin.inc.img')
@stop

@section('js')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#catchId[dataId]').click(function() {
            var id = $(this).attr('dataId');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data history with ID "+id+"??",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/list-history/"+id+"/destroy"
                } else {
                    swal("Deleted data canceled!!");
                }
            });
        })
    </script>


    @foreach ($history as $catch)    
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");
            
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById("myImg{{$catch->id}}");
            var modalImg = document.getElementById("imgPop");
            var captionText = document.getElementById("caption");
            img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
            }
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
            modal.style.display = "none";
            }
        </script>
    @endforeach
@endsection