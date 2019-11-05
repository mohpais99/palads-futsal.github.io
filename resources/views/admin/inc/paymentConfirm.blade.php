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
                <a href="#">Dashboard</a>
                <span>/</span>
                <a href="/list-payment">Payment</a>
                <span>/</span>
                <span>Payment Detail</span>
            </h4>
        </div>
    </div>
    <div class="card">
        <div class="row wow fadeIn m-4">
            <div class="col-md-3">
                @if ($payment->struk != null )
                    <img id="myImg{{$payment->id}}" src="/img/upload/{{$payment->struk}}" alt="pembayaran {{$payment->booking->nama_pemesan}}" class="img-thumbnail">
                @else
                <h5>Belum Upload</h5>
                @endif
            </div>
    
            <div class="col-md-9">
                <table class="mb-2">
                        <tr>
                            <td><strong>Nama Pemesan</strong></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td>{{$payment->booking->nama_pemesan}}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Main</strong></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td>{{date("d F Y", strtotime($payment->booking->tanggal_main))}}</td>
                        </tr>
                        <tr>
                            <td><strong>Harga</strong></td>
                            <td></td>
                            <td>:</td>
                            <td></td>
                            <td>Rp {{number_format($payment->harga)}}</td>
                        </tr>
                </table>
                @if ($payment->status === "Waiting" && $payment->struk !== null)
                <form action="/list-payment/{{$payment->id}}/update" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$payment->booking->user_id}}">
                    <input type="hidden" name="lapangan_id" value="{{$payment->booking->lapangan_id}}">
                    <input type="hidden" name="nama_pemesan" value="{{$payment->booking->nama_pemesan}}">
                    <input type="hidden" name="tanggal_main" value="{{$payment->booking->tanggal_main}}">
                    <input type="hidden" name="waktu_mulai" value="{{$payment->booking->waktu_mulai}}">
                    <input type="hidden" name="no_telp" value="{{$payment->no_telp}}">
                    <input type="hidden" name="harga" value="{{$payment->harga}}">
                    <input type="hidden" name="struk" value="{{$payment->struk}}">
                    <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">Confrim</button>
                </form>
                @endif
                <a href="/list-payment" class="btn btn-default btn-sm waves-effect waves-light">Back</a>
            </div>    
        </div>
    </div>
@stop

@section('js')
    @include('admin.inc.img') 
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");
        
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg{{$payment->id}}");
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
@endsection