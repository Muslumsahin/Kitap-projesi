@extends('front.app')

@section('content')
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href={{ route('index') }}">Anasayfa</a></li>
					<li class="active">Giriş Yap</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--account-starts-->
	<div class="account">
		<div class="container">
		<div class="account-top heading">
				<h2>GİRİŞ YAP</h2>
			</div>
			<div class="account-main">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
				<div class="col-md-6 account-left">
					<h3>Kullanıcı Girişi</h3>
					<div class="account-bottom">

						<input placeholder="Email" id="email" type="text" 
                               class="@error('email') is-invalid @enderror" name="email" 
                               value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <b><div style="color: red">{{ 'Bu kimlik bilgileri kayıtlarımızla eşleşmiyor.' }}</div></b><br>
                            </span>
                        @enderror
                            
                            <input placeholder="Password" id="password" type="password" 
                                   class="@error('password') is-invalid @enderror" name="password" 
                                   required autocomplete="current-password">
                                   
                        @error('password')
                            <span class="invalid-feedback" role="alert">
								<b><div style="color: red">{{ 'Bu kimlik bilgileri kayıtlarımızla eşleşmiyor.' }}</div></b><br>
                            </span>
                        @enderror
                        
						<div class="address">
							<input type="submit" value="{{ __('Login') }}">
						</div>
					</div>
				</div>
            </form>
				<div class="col-md-6 account-right account-left">
					<h3>Yeni misiniz? Hesap Oluşturun</h3>
					<p>Mağazamızda bir hesap oluşturarak, ödeme sürecinde daha hızlı ilerleyebilir, birden fazla teslimat adresi kaydedebilir, hesabınızdaki siparişlerinizi görüntüleyip takip edebilir ve daha fazlasını yapabilirsiniz.</p>
					<a href={{url('/register')}}>Hesap Oluştur</a>
				</div>
                
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
@endsection
                   