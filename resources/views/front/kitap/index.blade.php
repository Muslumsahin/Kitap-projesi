@extends('front.app')
@section('title')
    {{ $data[0]->name }}-{{ \App\Models\Yazar::getField($data[0]['yazarid'], 'name') }}
@endsection
@section('content')
    <script type="text/javascript">
        $(function() {

            var menu_ul = $('.menu_drop > li > ul'),
                menu_a = $('.menu_drop > li > a');

            menu_ul.hide();

            menu_a.click(function(e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true, true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true, true).slideUp('normal');
                }
            });

        });
    </script>
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{ route('index') }}">Anasayfa</a></li>
                    <li class="active">{{ $data[0]->name }}</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--start-single-->
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-12 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-4 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li>
                                        <div class="thumb-image"> <img src="{{ asset($data[0]->image) }}"
                                                data-imagezoom="true" class="img-responsive" alt="" /> </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{ $data[0]->name }}</h2>
                                <div class="star-on">
                                    <ul class="star-footer">
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                        <li><a href="#"><i> </i></a></li>
                                    </ul>
                                    <div class="review">
                                        <a href="#"> 1 customer review </a>

                                    </div>
                                    <div class="clearfix"> </div>
                                </div>

                                <h5 class="item_price">{{ $data[0]->fiyat }} &#8378;</h5>
                                <p>{{ $data[0]->aciklama }}</p>
                                <div class="available">
                                    <ul>
                                        <li></li>
                                        <li></li>
                                        <div class="clearfix"> </div>
                                    </ul>
                                </div>
                                <ul class="tag-men">
                                    <li><span>Yayinevi:</span>
                                        <span>{{ \App\Models\YayinEvi::getField($data[0]['yayineviid'], 'name') }}</span>
                                    </li>
                                    <li><span>Yazar:</span>
                                        <span>{{ \App\Models\Yazar::getField($data[0]['yazarid'], 'name') }}</span>
                                    </li>
                                </ul>
                                @auth
                                    <a href="{{ route('Sepete.ekle', ['id' => $data[0]['id']]) }}"
                                        class="add-cart item_add">Sepete Ekle</a>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="add-cart item_add">Sepete Ekle</a>
                                @endguest
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="tabs">
                        <ul class="menu_drop">
                            <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Description</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                            aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                            luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                            clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item2"><a href="#"><img src="images/arrow.png" alt="">Additional
                                    information</a>
                                <ul>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                            luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                            clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item3"><a href="#"><img src="images/arrow.png" alt="">Reviews (10)</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                            aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                            luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                            clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item4"><a href="#"><img src="images/arrow.png" alt="">Helpful
                                    Links</a>
                                <ul>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                            luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                            clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                            <li class="item5"><a href="#"><img src="images/arrow.png" alt="">Make A Gift</a>
                                <ul>
                                    <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                                            aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                            ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                    <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                            vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                            facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                            luptatum zzril delenit augue duis dolore</a></li>
                                    <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                            putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                            quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                            clari, fiant sollemnes </a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>

            <div class="row">
                <div class="latestproducts">

                    <div class="product-one">


                        @foreach (\App\Models\Kitap::inRandomOrder()->limit(3)->get() as $key => $value)
                            <div class="col-md-4 col-xs-12  product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{ route('Kitap.detay', ['selflink' => $value['selflink']]) }}"
                                        class="mask"><img class="img-responsive zoom-img"
                                            style="width:269px; height:400px;" src="{{ asset($value['image']) }}"
                                            alt="" /></a>
                                    <div class="product-bottom">
                                        <h3>{{ $value->name }}</h3>
                                        <p>{{ \App\Models\Yazar::getField($value['yazarid'], 'name') }}</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span
                                                class=" item_price">{{ $value['fiyat'] }} &#8378;</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
