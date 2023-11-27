@extends('layouts.admin')
@section('title')
Yazarlar Listesi
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <a href="{{route('YazarEkle')}}" class="btn btn-success">Yeni Yazar Ekle</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Yazarlar Tablosu</h4>
                        <p class="card-category">Envanterde Bulunan Yazarlar</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Yazar İsmi
                                    </th>
                                    <th>
                                        Düzenle
                                    </th>
                                    <th>
                                        Sil
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value )
                                    <tr>
                                        <td>
                                            {{$value->id}}
                                        </td>
                                        <td>
                                            {{$value->name}}
                                        </td>
                                        <td>
                                        <a href=" {{ route('YazarEdit', ['id'=> $value]) }}">
                                            Düzenle
                                        </a>
                                         </td>
                                        <td>
                                        <a href=" {{ route('Yazar.delete', ['id'=> $value]) }}">
                                            Sil
                                        </a>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection