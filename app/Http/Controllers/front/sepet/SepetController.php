<?php

namespace App\Http\Controllers\front\sepet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Kitap;
use App\Models\Order;
use App\Helper\SepetHelper;
use Illuminate\Support\Facades\Auth;

class SepetController extends Controller
{
    public function index()
    {
        return view('front.basket.index');
    }
    public function add($id)
    {
        $sepet = Kitap::where('id',"=", $id)->first();
    
        if ($sepet !== null) {
            SepetHelper::add($id, $sepet['fiyat'], $sepet['image'], $sepet['name']);
            return redirect()->back()->with('success', 'Sepete Eklendi');
        } else {
           
            return redirect()->route('index');
        }
    }

    public function remove($id)
    {

        SepetHelper::remove($id);

        return redirect()->back()->with('info', 'Ürün sepetten kaldırıldı');
    }

    public function liste()
    {
        // Sepet içeriğini görüntülemek için gerekli işlemleri yapın
        // Örneğin:
        $sepet = SepetHelper::allList();
        $toplamFiyat = SepetHelper::totalPrice();

        return view('sepet.liste', ['sepet' => $sepet, 'toplamFiyat' => $toplamFiyat]);
    }

    public function flush(){
        Session::forget('basket');
        return redirect('/');
    }

    public function complete(){
        if(SepetHelper::countData() != 0)  {
            return view('front.basket.complete');
        }
        else{
            return redirect('/');
        }
    }

    public function completeStore(Request $request)
    {
        $request->validate([
            'adres' => 'required',
            'telefon' => 'required',
        ]);
    
        $adres = $request->adres;
        $telefon = $request->telefon;
        $mesaj = $request->mesaj;
        $json = json_encode(SepetHelper::allList());
    
        $array = [
            'userid' => Auth::id(),
            'adres' => $adres,
            'telefon' => $telefon,
            'mesaj' => $mesaj,
            'json' => $json,
        ];
    
        $insert = Order::create($array);
    
        if ($insert) {
            // Sipariş başarıyla eklendiyse sepeti temizle
            SepetHelper::clear();
            return redirect()->back()->with('success', 'Siparişiniz Alındı');
        } else {
            return redirect()->back()->with('error', 'Sipariş Tamamlanamadı');
        }
    }
}


