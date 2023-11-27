@extends('front.app')
@section('title')
    Kitap Projesi
@endsection
@section('content')
    <!--banner-starts-->
@section('search')
<form action="{{route('search')}}">
	<div class="search-bar">
		<input name="q" id="search-criteria" type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
		<input id="search" type="submit" value="">
	</div>
	</form>
@endsection

<div class="product">
    <div class="container">
        <div class="product-top">
            @foreach ($data->chunk(4) as $chunk )
            <div class="product-one">
                @foreach ($chunk as $key => $value )
                <div class="col-md-3 product-left" style="margin-top:25px;">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="{{route('Kitap.detay',['selflink'=>$value['selflink']])}}" class="mask"><img style="width: 125px; height:200px" class="img-responsive zoom-img" src="{{$value->image}}" alt="" /></a>
                        <div class="product-bottom">
                            <h3>{{$value->name}}</h3>
                            <p>{{\App\Models\Yazar::getField($value['yazarid'],'name')}}</p>
                            <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{$value->fiyat}} &#8378;</span></h4>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
                @endforeach
                {{$data->links()}}
        </div>
    </div>
</div>
</div>
<!--product-end-->

@endsection
