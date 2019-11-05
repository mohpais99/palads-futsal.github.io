<div class="modal fade show" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="/event/{{$event->id}}/update" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="md-form">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control validate" value="{{$event->title}}">
                    </div>
                
                    <div class="md-form">
                        <label>Description</label>
                        <textarea name="description" class="form-control md-textarea" rows="3">{{$event->description}}</textarea>
                    </div>

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>