<?php

namespace App\Http\Controllers\admin\kategori;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategoriler;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index(){
        $data = Kategoriler::paginate(10);
        return view('admin.kategori.list', ['data' => $data]);
        
       }
    
       public function add(){
        return view('admin.Kategori.add');
       }
    
       public function create(Request $request){
        
        $request->validate([
            "kategori" => 'required|string',
        ]);
    
        $kategori = $request->kategori;
        $selflink = Str::of($kategori)->slug('-');
        $kontrol = Kategoriler::whereSelflink($selflink)->first();
        
        if($kontrol){
           
                return redirect()->route('KategoriEkle')->with('hata','Kategori Ekleme Başarısız. Daha Önce Eklenmiş Olabilir.');
            }
            else{
                Kategoriler::create([
                    "name" => $kategori,
                    "selflink" => $selflink
                ]);
                return redirect()->route('KategoriEkle')->with('status','Kategori Başarıyla Eklendi');
            }
       }
    
       public function delete($id){
        $c = Kategoriler::where('id', '=', $id)->count();
        if($c!=0){
            $delete = Kategoriler::where('id', '=', $id)->delete();
            return redirect()->back();
        }
       
       else{
            return redirect('/');
           }
        }
}
