<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Upload Bukti Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form action="/payment/{{$payment->id}}/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <input type="hidden" name="id" value="{{$payment->id}}">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="struk">
                            <label class="custom-file-label" for="struk">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default btn-sm">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>