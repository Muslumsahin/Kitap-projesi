@extends('layouts.admin')
@section('title')
Slider Listesi
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <a href="{{route('SliderEkle')}}" class="btn btn-success">Yeni Slider Ekle</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Slider Tablosu</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Slider
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
                                            <img src="{{asset('front/images/'.$value->name)}}" style="width: 200px;height:75px" alt="">
                                            
                                        </td>
                                        <td>
                                           <a href=" {{ route('Slider.edit', ['id'=> $value]) }}">
                                            Düzenle
                                            </a>
                                        </td> 
                                        <td>
                                            <a href=" {{ route('Slider.delete', ['id'=> $value]) }}">
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