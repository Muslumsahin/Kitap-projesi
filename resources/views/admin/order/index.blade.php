@extends('layouts.admin')
@section('title')
Sipariş Listesi
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Sipariş Listesi</h4>
                        <p class="card-category">Eklenen Siparişler</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Alıcı
                                    </th>
                                    <th>
                                       Adres
                                    </th>
                                    <th>
                                        Telefon
                                    </th>
                                    <th>
                                       Detay
                                    </th>
                                    <th>
                                        Sil
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $value )
                                    <tr>
                                        <td>
                                            {{\App\Models\User::getField($value['userid'],'name')}}
                                        </td>
                                        <td>
                                            {{$value['adres']}}
                                        </td>
                                        <td>
                                            {{$value['telefon']}}
                                        </td>
                                        <td>
                                            <a href=" {{ route('order.detail', ['id'=> $value]) }}">
                                            Detay
                                             </a>
                                         </td>
                                        <td>
                                           <a href=" {{ route('order.delete', ['id'=> $value]) }}">
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