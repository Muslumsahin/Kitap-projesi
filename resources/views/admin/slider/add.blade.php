@extends('layouts.admin')
@section('title')
Slider Ekleme Sayfası
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
                        <h4 class="card-title">Slider Ekle</h4>
                        <p class="card-category">Slider Ekleme Formu</p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('Slider.post')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Slider</label>
                                        <input type="file" style="opacity: 1;position:initial;" name="sliderImage" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Slider Ekle</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection