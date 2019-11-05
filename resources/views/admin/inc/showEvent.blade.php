@extends('admin.layouts.app')

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
                <img src="/img/event/{{$event->gambar}}" alt="thumbnail" class="img-thumbnail">
            </div>
    
            <div class="col-md-9">
                <table class="mb-2">
                    <tr>
                        <td><strong>Title</strong></td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>{{$event->title}}</td>
                    </tr>
                    
                    <tr>
                        <td><strong>Deskripsi</strong></td>
                        <td></td>
                        <td>:</td>
                        <td></td>
                        <td>{{$event->description}}</td>
                    </tr>
                </table>
                <button class="btn btn-sm btn-success" type="submit" data-toggle="modal" data-target="#modalLRFormDemo">Edit</button>
            </div>    
        </div>
    </div>
    @include('admin.inc.editEvent')
@stop
