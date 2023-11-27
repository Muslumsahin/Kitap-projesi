@extends('front.app')
@section('title')
    Sepetiniz
@endsection

@section('content')
    <!--start-breadcrumbs-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Sepet</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <script>
        $(document).ready(function(c) {
            $('.close1').on('click', function(c) {
                $('.cart-header').fadeOut('slow', function(c) {
                    $('.cart-header').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.close2').on('click', function(c) {
                $('.cart-header1').fadeOut('slow', function(c) {
                    $('.cart-header1').remove();
                });
            });
        });
    </script>
    <script>
        $(document).ready(function(c) {
            $('.close3').on('click', function(c) {
                $('.cart-header2').fadeOut('slow', function(c) {
                    $('.cart-header2').remove();
                });
            });
        });
    </script>
    <!--start-ckeckout-->
    <div class="ckeckout">
        <div class="container">
            <div class="ckeck-top heading">
                <h2>SEPETİNİZ</h2>
            </div>
            <div class="ckeckout-top">
                <div class="cart-items">
                    <h3>Sepetim ({{ \App\Helper\SepetHelper::countData() }})</h3>
                    <div class="in-check">
                        <ul class="unit">
                            <li><span>Kitap</span></li>
                            <li><span>Kitap İsmi</span></li>
                            <li><span>Kitap Fiyatı</span></li>
                            <li><span>Gönderi Seçenekleri</span></li>
                            <li> </li>
                            <div class="clearfix"> </div>
                        </ul>
                        @foreach (\App\Helper\SepetHelper::allList() as $key => $value)
                            <ul class="cart-header">
                                <a href="{{ route('basket.remove', ['id' => $key]) }}">
                                    <div class="close1"></div>
                                </a>
                                    <li class="ring-in">
                                        <a><img style="width: 125px; height: 200px;" src="{{ asset($value['image']) }}"
                                                class="img-responsive" alt=""></a>
                                    </li>
                                    <li><span class="name">{{ $value['name'] }}</span></li>
                                    <li><span class="cost">{{ $value['fiyat'] }} &#8378;</span></li>
                                    <li><span>Free</span>
                                        <p>Delivered in 2-3 business days</p>
                                    </li>
                                    <div class="clearfix"></div>
                            </ul>
                        @endforeach

                    </div>
                    <a class="add-cart" href="{{route('basket.complete')}}"> Alışverişi tamamla </a>
                </div>
           
            </div>

         
        </div>
    </div>
    <!--end-ckeckout-->
@endsection
