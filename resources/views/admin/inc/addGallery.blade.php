@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="/admin">Dashboard</a>
                <span>/</span>
                <a href="/list-gallery">Gallery</a>
                <span>/</span>
                <span>Tambah Data</span>
            </h4>
        </div>
    </div>

    <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-body table-responsive ">
                    <form action="/push-gallery" method="POST" enctype="multipart/form-data" class="needs-validation">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm" type="submit">Submit form</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop