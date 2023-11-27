
<body> 
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-12 col-xs-12 top-header-left">
					<div class="drop">
						
						@auth
						<div class="col-md-6 col-xs-12 ">
							{{--Kullanıcı Adı--}}
							<span style="color:#fff">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
							
							
							{{--Çıkış Yap işlemi--}}
							<a href="{{ route('logout') }}" style="color: #fff; padding:0 0 0 20px;"
                                onclick="event.preventDefault();
                                	document.getElementById('logout-form').submit();">
                            {{ __('Çıkış Yap') }}
                            </a>
							@can('isAdmin')
							<a href="{{route('dashboard')}}" style="margin-left: 10px; text-decoration:none; color:#bba1a1">Admin Sayfası</a>
							@endcan
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
						{{-- Sepet --}}
						<div class=" top-header-left">
							<div class="cart box_1 ">
								<a href="{{route('basket.index')}}">
									 <div class="total">
										<span style="color: #fff">{{\App\Helper\SepetHelper::totalPrice()}} &#8378;</span>
										<img src="{{asset('front/images/cart-1.png')}}" alt="" />
										<span style="padding:0 0 0 20px;" ><a href="{{route('basket.flush')}}" class="simpleCart_empty">Sepeti Temizle</a></span>
									</div>
								</a>
								
								<div class="clearfix"> </div>
							</div>
						</div>	
						@endauth
						@guest
						<div class="col-md-6">
						<div class="box">
							<a href="{{url('/login')}}" style="color:#fff">Giriş Yap</a>
							</div>
							<div>
							<a href="{{url('/register')}}" style="color:#fff">Kayıt Ol</a>
							</div>
						</div>
						@endguest
						<div class="clearfix"></div>
					</div>
				</div>
			
				
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="{{route('index')}}"><h1>Kitap Projesi</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
				<div class="top-nav">
					<ul class="memenu skyblue"><li class="active"><a href="{{route('index')}}">Anasayfa</a></li>
						@foreach (\App\Models\Kategoriler::all() as $key=> $value )
						<li class="grid"><a href="#">{{$value->name}}</a>
						</li>	
						@endforeach

						<li class="grid"><a href="contact.html">Contact</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right"> 
				@yield('search')
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->
