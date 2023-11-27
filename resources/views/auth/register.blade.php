@extends('front.app')
@section('title')
    Kayıt Ol
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href={{ route('index') }}">Anasayfa</a></li>
                    <li class="active">Kayıt Ol</li>
                </ol>
            </div>
        </div>
    </div>
    <!--register-starts-->
    <div class="register">
        <div class="container">
            <div class="register-top heading">
                <h2>KAYIT OL</h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="register-main">
                <div class="col-md-7 account-left">
                    <input class=" @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required placeholder="İsminizi Giriniz" type="text" tabindex="1">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input class="@error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" placeholder="Email Adresiniz" type="text" tabindex="3" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <div style="color: red">{{ 'Mail Adresi Geçerli Değil' }}</div><br>
                        </span>
                    @enderror
                    
            
                </div>
                <div class="col-md-7 account-left">
                    <input id="password" type="password"
                    class="@error('password') is-invalid @enderror" name="password"
                    required autocomplete="new-password" placeholder="Şifrenizi Giriniz" type="password" tabindex="4" required>
                    
                    <input id="password-confirm" type="password" class=""
                    name="password_confirmation" required autocomplete="new-password"placeholder="Şifrenizi tekrar girin" type="password" tabindex="4" required>
                   
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <div style="color: red">{{ 'Şifre Eşleşmedi Tekrar Deneyin' }}</div><br>
                    </span>
                @enderror
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="address submit">
                <input type="submit" value="Submit">
            </div>
            </div>
        </div>
    </div>
    <!--register-end-->

@endsection
