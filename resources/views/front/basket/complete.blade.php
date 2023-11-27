@extends('front.app')
@section('title')
Alışverişi Tamamla
@endsection

@section('content')
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="{{route('index')}}">Anasayfa</a></li>
					<li class="active">Alışverişi Tamamla</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->

    <!--contact-start-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h2>ALIŞVERİRİŞİ TAMAMLA</h2>
			</div>
				<div class="contact-text">
			
					</div>
					<div class="col-md-12 contact-right">
						<form action="{{route('basket.store')}}" method="POST">
                            @csrf
							<input style="margin-right: 10px;" name="adres" type="text" placeholder="Adres">
							<input name="telefon" type="text" placeholder="Phone">
							<textarea name="mesaj" placeholder="Message" required=""></textarea>
							<div class="submit-btn">
								<input type="submit" value="SUBMIT">
							</div>
						</form>
					</div>	
					<div class="clearfix"></div>
				</div>
		</div>
	</div>
	<!--contact-end-->
@endsection