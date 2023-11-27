@extends('layouts.admin')
@section('title')
Kitap Ekleme Sayfası
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
                        <h4 class="card-title">Kitap Ekle</h4>
                        <p class="card-category">Kitap Ekleme Formu</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('Kitap.post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kitap Adı</label>
                                        <input type="text" name="kitapName" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kitap Resmi</label>
                                        <input type="file" style="opacity: 1;position:initial;" name="kitapImage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Yazar Adı-Soyadı</label>
                                        <select name="yazariName" class="form-control">
                                                <option value="" disabled selected hidden">Kitap Yazarını Seçiniz</option>
                                            @foreach ($yazar as $key => $value)
                                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Yayin Evi</label>
                                        <select name="yayineviName" class="form-control">
                                                <option value="" disabled selected hidden">Yayınevini Seçiniz</option>
                                            @foreach ($yayinevi as $key => $value)
                                                <option value="{{$value['id']}}">{{$value['name']}}</option>
                                            @endforeach
                                        </select>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kitap Fiyatı</label>
                                        <input type="text" name="kitapFiyat" class="form-control">
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Kitap Açıklama</label>
                                        <textarea rows="5" name="kitapAciklama" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Kitap Ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection