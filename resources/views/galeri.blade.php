@extends('layouts.app')

@section('css')
    <style>
        header, .about {
            height: 80vh !important;
        }

        .des {
            font-size: 18px;
        }

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
                    @foreach ($gallery as $item)
                        <div class="col-lg-4 col-md-12 mb-3">
                            <div class="calm z-depth-1-half">
                                <img id="myImg{{$item->id}}" src="img/gallery/{{$item->gambar}}" class="img-fluid" alt="Gallery Palads Futsal">
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <div class="card-body d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pg-blue">
                        {{ $gallery->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </main>
    @stop

@section('js')
    @include('inc.img')

    @foreach ($gallery as $catch)    
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