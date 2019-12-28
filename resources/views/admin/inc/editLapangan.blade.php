@extends('admin.layouts.app')

@section('content')
    <div class="card mb-4 wow fadeIn">
        <div class="card-body d-sm-flex justify-content-between">
            <h4 class="mb-2 mb-sm-0 pt-1">
                <a href="#">Dashboard</a>
                <span>/</span>
                <a href="/list-lapangan">Lapangan</a>
                <span>/</span>
                <span>Edit Lapangan</span>
            </h4>
        </div>
    </div>
    <div class="card">
        <div class="row wow fadeIn m-4">
            <div class="col-md-3">
                <img src="/img/lapangan/{{$lapangan->foto}}" alt="thumbnail" class="img-thumbnail mb-2">
                <form action="/lapangan/{{$lapangan->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="foto">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                </div>
            </div>
    
            <div class="col-md-9">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="nama">Nama Lapangan</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$lapangan->nama}}" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control rounded-0" id="deskripsi" name="deskripsi" rows="4" placeholder="Make some text here ...">{{$lapangan->deskripsi}}</textarea>
                    </div>
                </div>
                <button class="btn btn-outline-primary" type="submit">Save</button>
                </form>
            </div>    
        </div>
    </div>
@stop
