@extends('layouts.admin')
@section('title')
Yazar Ekleme Sayfası
@endsection
@section('content')
<style>
    input::file-selector-button {
      font-weight: bold;
      color: dodgerblue;
      padding: 0.5em;
      border: thin solid grey;
      border-radius: 3px;
    }
    </style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session("status"))
                <div class="alert alert-success" role="alert">
                    {{session("status")}}
                </div>  
                @endif
                @if (session("hata"))
                <div class="alert alert-danger" role="alert">
                    {{session("hata")}}
                  </div>
                </div>  
                @endif
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Yazar Düzenle</h4>
                        <p class="card-category">{{$data[0]['name']}}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('Yazar.edit',['id'=>$data[0]['id']])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Yazar Adı-Soyadı</label>
                                        <input type="text" name="yazarName" value="{{$data[0]['name']}}" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if($data[0]['image']!="")
                                        <img src="{{asset('admin/assets/images/'.$data[0]['image'])}}" style="width: 150px;height:200px" alt="">
                                        @endif
                                        <label class="bmd-label-floating">Yazar Resmi</label>
                                        <input type="file" style="opacity: 1;position:initial;" name="yazarImage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Yazar Bio</label>
                                        <textarea rows="5" name="yazarBio" class="form-control">{{$data[0]['bio']}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Yazar Düzenle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection