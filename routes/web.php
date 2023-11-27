<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\Yayinevi\YayinEviController;
use App\Http\Controllers\admin\Yazar\YazarController;
use App\Http\Controllers\admin\Kitap\KitapController;
use App\Http\Controllers\admin\Kategori\KategoriController;
use App\Http\Controllers\admin\order\OrderController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\kitap\KitapDetayController;
use App\Http\Controllers\front\sepet\SepetController;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


Route::group(["prefix"=> "admin", "middleware" => ['auth','adminCtrl']], function () {
Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard');

Route::controller(YayinEviController::class)->prefix('yayinevi')->group(function(){
    Route::get('/liste', 'index')->name('YayinEviListe');
    Route::get('/ekle','add')->name('YayinEviEkle');
    Route::post('/eklendi','create')->middleware('XSS')->name('YayinEvi.post');
    Route::get('/duzenle/{id}','edit')->name('YayinEviEdit');
    Route::post('/duzenle/{id}','update')->middleware('XSS')->name('YayinEvi.edit');
    Route::get('/sil/{id}','delete')->name('Yayinevi.delete');
});

Route::controller(YazarController::class)->prefix('Yazar')->group(function () {
    Route::get('/liste','index')->name('YazarListe');
    Route::get('/ekle','add')->name('YazarEkle');
    Route::post('/eklendi','create')->middleware('XSS')->name('Yazar.post');
    Route::get('/duzenle/{id}','edit')->name('YazarEdit');
    Route::post('/duzenle/{id}','update')->middleware('XSS')->name('Yazar.edit');
    Route::get('/sil/{id}','delete')->name('Yazar.delete');
});

Route::controller(KitapController::class)->prefix('Kitap')->group(function () {
    Route::get('/liste','index')->name('KitapListe');
    Route::get('/ekle','add')->name('KitapEkle');
    Route::get('/duzenle/{id}','edit')->name('KitapEdit');
    Route::post('/duzenle/{id}','update')->middleware('XSS')->name('Kitap.edit');
    Route::post('/eklendi','create')->middleware('XSS')->name('Kitap.post');
    Route::get('/sil/{id}','delete')->name('Kitap.delete');
});

Route::controller(KategoriController::class)->prefix('Kategori')->group(function () {
    Route::get('/liste','index')->name('KategoriListe');
    Route::get('/ekle','add')->name('KategoriEkle');
    Route::post('/eklendi','create')->middleware('XSS')->name('Kategori.post');
    Route::get('/sil/{id}','delete')->name('Kategori.delete');
});

Route::controller(SliderController::class)->prefix('slider')->group(function () {
    Route::get('/liste','index')->name('SliderListe');
    Route::get('/ekle','add')->name('SliderEkle');
    Route::get('/duzenle/{id}','edit')->name('SliderEdit');
    Route::post('/duzenle/{id}','update')->middleware('XSS')->name('Slider.edit');
    Route::post('/eklendi','create')->middleware('XSS')->name('Slider.post');
    Route::get('/sil/{id}','delete')->name('Slider.delete');
});

Route::controller(OrderController::class)->prefix('order')->group(function () {
    Route::get('/siparisler','index')->name('order.index');
    Route::get('/siparisler/detail/{id}','detail')->name('order.detail');
    Route::get('/siparisler/delete/{id}','delete')->name('order.delete');

});
});
Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/search', [FrontController::class,'search'])->name('search');

Route::get('/kitap/detay/{selflink}', [KitapDetayController::class,'index'])->name('Kitap.detay');


Route::get('/basket/add/{id}',[SepetController::class,'add'])->name('Sepete.ekle');
Route::get('/basket',[SepetController::class,'index'])->middleware('auth')->name('basket.index');
Route::get('/basket/remove/{id}',[SepetController::class,'remove'])->middleware('auth')->name('basket.remove');
Route::get('/basket/flush',[SepetController::class,'flush'])->name('basket.flush');
Route::get('/basket/complete',[SepetController::class,'complete'])->middleware('auth')->name('basket.complete');
Route::post('/basket/complete',[SepetController::class,'completeStore'])->middleware('auth')->name('basket.store');




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


