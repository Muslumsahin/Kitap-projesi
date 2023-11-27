<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="{{route('index')}}" class="simple-text logo-normal">
            Anasayfaya Dön
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{Request::is('admin/dashboard') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/yayinevi/liste') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('YayinEviListe')}}">
                    <i class="material-icons">collections_bookmark</i>
                    <p>Yayınevleri</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/Kategori/liste') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('KategoriListe')}}">
                    <i class="material-icons">category</i>
                    <p>Kategoriler</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/Yazar/liste') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('YazarListe')}}">
                    <i class="material-icons">face</i>
                    <p>Yazarlar</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/Kitap/liste') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('KitapListe')}}">
                    <i class="material-icons">menu_book</i>
                    <p>Kitaplar</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/slider/liste') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('SliderListe')}}">
                    <i class="material-icons">slideshow</i>
                    <p>Slider</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/order/siparisler') ? 'active' : ''}} ">
                <a class="nav-link" href="{{route('order.index')}}">
                    <i class="material-icons">shopping_cart_checkout</i>
                    <p>Siparişler</p>
                </a>
            </li>
        </ul>
    </div>
</div>