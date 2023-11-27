@extends('layouts.admin')
@section('title')
Sipariş Detayı
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Sipariş Detayı</h4>
                        
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alıcı:</label>
                                        {{ \App\Models\User::getField($data['userid'], 'name') }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Adres:</label>
                                        {{$data['adres']}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Telefon:</label>
                                        {{ $data['telefon'] }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mesaj</label>
                                        {{ $data['mesaj'] }}
                                    </div>
                                </div>
                            </div>

                            @foreach (json_decode($data['json'],true) as $key => $value )
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kitap Adı</label>
                                        {{ $value['name'] }}
                                        <br>
                                        <label>Fiyatı</label>
                                        {{ $value['fiyat'] }} &#8378;
                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection