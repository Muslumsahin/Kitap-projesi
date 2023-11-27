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

	<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
			<ul class="rslides" id="slider4">
				@foreach (\App\Models\Slider::all() as $key => $value )
				<li>
					<img src="{{asset('front/images/'.$value->name)}}" alt=""/>
				</li>
				@endforeach
			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 
	<!--Slider-Starts-Here-->
				<script src="{{asset('front/js/responsiveslides.min.js')}}"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: true,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->
	<div class="product"> 
		<div class="container">
			<div class="product-top">
				@foreach (App\Models\Kitap::all()->chunk(4) as $chunk )
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
				</div>				
			</div>
		</div>
	</div>
	<!--product-end-->

    @endsection