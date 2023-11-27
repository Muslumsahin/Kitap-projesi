@extends('layouts.admin')
@section('title')
Kitap Düzenleme Sayfası
@endsection
@section('content')
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
                        <h4 class="card-title">Kitap Düzenle</h4>
                        <p class="card-category">{{$data->name}}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('Kitap.edit',['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kitap Adı</label>
                                        <input type="text" name="kitapName" value="{{$data->name}}" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @if($data->image!="")
                                        <img src="{{asset($data->image)}}" style="width: 150px;height:200px" alt="">
                                        @endif
                                        <label class="bmd-label-floating">Kitap Resmi</label>
                                        <input type="file" style="opacity: 1;position:initial;" name="kitapImage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Yazar Adı-Soyadı</label>
                                        <select name="yazariName" class="form-control">
                                            @foreach ($yazar as $key => $value)
                                                <option @if($value->id == $data->id) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Yayin Evi</label>
                                        <select name="yayineviName" class="form-control">
                                            @foreach ($yayinevi as $key => $value)
                                                <option @if($value['id']==$data->yayineviid) selected @endif value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kitap Fiyatı</label>
                                        <input type="text" name="kitapFiyat" value="{{$data->fiyat}}" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kitap Açıklama</label>
                                        <textarea rows="5" name="kitapAciklama" class="form-control">{{$data->aciklama}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Kitap Düzenle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection