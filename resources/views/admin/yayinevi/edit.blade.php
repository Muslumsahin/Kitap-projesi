@extends('layouts.admin')
@section('title')
Yayın Evi Düzenleme Sayfası
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
                        <h4 class="card-title">Yayın Evi Düzenle</h4>
                        <p class="card-category">{{$data[0]['name']}}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('YayinEvi.edit',['id'=>$data[0]['id']])}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Yayin Evi Adı</label>
                                        <input type="text" value="{{$data[0]['name']}}" name="yayinevi" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Yayın Evi Ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection