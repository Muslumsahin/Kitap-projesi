@extends('layouts.admin')
@section('title')
Yayın Evi Listesi
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <a href="{{route('YayinEviEkle')}}" class="btn btn-success">Yeni Yayinevi Ekle</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Yayınevleri Tablosu</h4>
                        <p class="card-category">Envanterde Bulunan Yayınevleri</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Yayınevi
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
                                            <a href=" {{ route('YayinEviEdit', ['id'=> $value]) }}">
                                            Düzenle
                                             </a>
                                         </td>
                                        <td>
                                           <a href=" {{ route('Yayinevi.delete', ['id'=> $value]) }}">
                                            Sil
                                            </a>
                                        </td>
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