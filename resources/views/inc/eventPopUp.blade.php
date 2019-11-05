@foreach ($event as $catch)
    <div class="modal fade show" id="modalPopUp{{$catch->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog modal-notify modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading">{{$catch->title}}</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <img src="/img/event/{{$catch->gambar}}" alt="Gambar Event" class="img-fluid z-depth-1-half">
                            <div style="height: 10px"></div>
                        </div>
                        <div class="col-8">
                            <p class="card-text">
                                <strong>{{$catch->description}}</strong>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
@endforeach