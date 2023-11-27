<?php
namespace App\Helper;
use Illuminate\Support\Facades\Session;

class SepetHelper
{
    public static function add($id, $fiyat, $image, $name)
    {
        $sepet = session()->get('basket', []);
    
        if (array_key_exists($id, $sepet)) {
      
        } else {
            // Eğer ürün ilk kez ekleniyorsa, yeni bir öğe oluştur
            $sepet[$id] = [
                'id' => $id,
                'fiyat' => $fiyat,
                'image' => $image,
                'name' => $name,
               
            ];
        }
    
        session()->put('basket', $sepet);
    }

    public static function allList()
    {
        return session()->get('basket', []);
    }

    public static function totalPrice()
    {
        $sepet = self::allList();
        return collect($sepet)->sum('fiyat');
       
    }

    public static function countData()
    {
        return count(session()->get('basket', []));
    }

    public static function remove($id)
    {
        $sepet = session()->get('basket', []);
    
        if (array_key_exists($id, $sepet)) {
            // Eğer öğe sepette varsa, onu sepetten kaldır
            unset($sepet[$id]);
            session()->put('basket', $sepet);
        }
    }

    public static function clear()
    {
        session()->forget('basket');
    }
}
