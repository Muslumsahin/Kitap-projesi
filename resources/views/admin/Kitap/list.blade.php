@extends('layouts.admin')
@section('title')
Kitaplar Listesi
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <a href="{{route('KitapEkle')}}" class="btn btn-success">Yeni Kitap Ekle</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Kitaplar Tablosu</h4>
                        <p class="card-category">Envanterde Bulunan Kitaplar</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Kitap Adı
                                    </th>
                                    <th>
                                        Yazarı
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
                                            {{\App\Models\Yazar::getField($value['yazarid'],'name')}}
                                        </td>
                                        <td>
                                            <a href=" {{ route('KitapEdit', ['id'=> $value]) }}">
                                            Düzenle
                                             </a>
                                         </td>
                                        <td>
                                           <a href=" {{ route('Kitap.delete', ['id'=> $value]) }}">
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