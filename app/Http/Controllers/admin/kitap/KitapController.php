<?php

namespace App\Http\Controllers\admin\kitap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kitap;
use App\Models\Yazar;
use App\Models\YayinEvi;
use Illuminate\Support\Facades\DB;

class KitapController extends Controller
{
    public function index()
    {

        $data = Kitap::paginate(10);
        $yazar = Yazar::all();
        $yayinevi = YayinEvi::all();
        return view('admin.Kitap.list', ['data' => $data, 'yazar' => $yazar, 'yayinevi' => $yayinevi]);
    }
    public function add(Request $request)
    {
        $yazar = Yazar::all();
        $yayinevi = YayinEvi::all();
        return view('admin.Kitap.add', ['yazar' => $yazar, 'yayinevi' => $yayinevi]);
    }

    public function create(Request $request)
    {
        $request->validate([
            "kitapName" => 'required|string',
            "yazariName" => 'required|string',
            "kitapImage" => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);
    
        $all = $request->except('_token');
        $selflink = Str::of($all['kitapName'])->slug('-');
        $kontrol = Kitap::whereSelflink($selflink)->first();
    
        if ($kontrol) {
            return redirect()->route('KitapEkle')->with('hata', 'Kitap ekleme başarısız. Daha önce eklenmiş olabilir.');
        } else {
            try {
                $kitapImage = 'front/images/'. uniqid() . "." . $request->kitapImage->getClientOriginalExtension();
                $request->kitapImage->move(public_path('front' . DIRECTORY_SEPARATOR . 'images'), $kitapImage);
    
                Kitap::create([
                    "name" => $all['kitapName'],
                    "selflink" => $selflink,
                    "image" => $kitapImage,
                    "yazarid" => $all['yazariName'],
                    "yayineviid" => $all['yayineviName'],
                    "fiyat" => $all['kitapFiyat'],
                    "aciklama" => $all['kitapAciklama'],
                ]);
    
                return redirect()->route('KitapEkle')->with('status', 'Kitap başarıyla eklendi');
            } catch (\Exception $e) {
                // Dosya yükleme veya kayıt işlemi sırasında bir hata oluştu
                return redirect()->route('KitapEkle')->with('hata', 'Kitap ekleme sırasında bir hata oluştu.');
            }
        }
    }

    public function edit($id)
    {
        $kitapExists = Kitap::where('id', $id)->exists();
    
        if ($kitapExists) {
            $data = Kitap::with('yazar', 'yayinevi')->find($id);
            $yazar = Yazar::all();
            $yayinevi = YayinEvi::all();
    
            return view('admin.kitap.edit', ['data' => $data, 'yazar'=> $yazar, 'yayinevi'=>$yayinevi]);
        } else {
            return redirect()->back();
        }
    }
    

    public function update(Request $request)
    {
        $id = $request->route('id');
    
        // Validate input data here...
    
        $bookExists = Kitap::where('id', $id)->exists();
    
        if ($bookExists) {
            $book = Kitap::find($id);
    
            $all = $request->except('_token');
    
            $selflink = Str::of($all['kitapName'])->slug('-');
    
            if ($request->hasFile('kitapImage')) {
                
                $kitapImage = 'front/images/'.rand(1, 10000) . "." . $request->kitapImage->getClientOriginalExtension();
                
                $request->kitapImage->move(public_path('front' . DIRECTORY_SEPARATOR . 'images'), $kitapImage);
            } else {
                
                $kitapImage = $book->image;
            }
    
            $book->update([
                "name" => $all['kitapName'],
                "selflink" => $selflink,
                "image" => $kitapImage,
                "yazarid" => $all['yazariName'],
                "yayineviid" => $all['yayineviName'],
                "fiyat" => $all['kitapFiyat'],
                "aciklama" => $all['kitapAciklama']
            ]);
    
            return redirect()->route('KitapListe')->with('status', 'Kitap Başarıyla Düzenlendi');
        } else {
            return redirect()->route('KitapListe')->with('hata', 'Kitap Düzenlenemedi');
        }
    }
    

    public function delete($id)
    {
        $c = Kitap::where('id', '=', $id)->count();
        if ($c != 0) {
            $delete = Kitap::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect('/');
        }
    }
}
