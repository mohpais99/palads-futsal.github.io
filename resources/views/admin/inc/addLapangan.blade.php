<div class="modal fade show" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/lapangan/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Lapangan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="md-form">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control validate" placeholder="Isi nama lapangan">
                        </div>
                    
                        <div class="md-form">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control md-textarea" rows="3" placeholder="Isi deskripsi lapangan..."></textarea>
                        </div>
    
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="foto">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>