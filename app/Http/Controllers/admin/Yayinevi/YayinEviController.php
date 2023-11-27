<?php

namespace App\Http\Controllers\admin\Yayinevi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YayinEvi;
use Illuminate\Support\Str;

class YayinEviController extends Controller
{
   public function index(){
    $data = YayinEvi::paginate(10);
    return view('admin.yayinEvi.list', ['data' => $data]);
    
   }

   public function add(){
    return view('admin.yayinEvi.add');
   }

   public function create(Request $request){
    
    $request->validate([
        "yayinevi" => 'required|string',
    ]);

    $yayinevi = $request->yayinevi;
    $selflink = Str::of($yayinevi)->slug('-');
    $kontrol = YayinEvi::whereSelflink($selflink)->first();
    
    if($kontrol){
       
            return redirect()->route('YayinEviEkle')->with('hata','Yayinevi Ekleme Başarısız. Daha Önce Eklenmiş Olabilir.');
        }
        else{
            YayinEvi::create([
                "name" => $yayinevi,
                "selflink" => $selflink
            ]);
            return redirect()->route('YayinEviEkle')->with('status','Yayinevi Başarıyla Eklendi');
        }
   }
   public function edit($id){
    $control = YayinEvi::where('id', '=', $id)->count();
    if($control!=0){
        $data = YayinEvi::where('id', '=', $id)->get();
        return view('admin.yayinevi.edit',['data' => $data]);
    }
    else{
        return redirect()->back();
    }
   }

   public function update(Request $request){
    $id = $request->route('id');
    $control = YayinEvi::where('id', '=', $id)->count();
    if($control!=0){
       $yayinevi = $request->yayinevi;
       $selflink = Str::of($yayinevi)->slug('-');
       $update = YayinEvi::where('id', '=', $id)->update(['name'=> $yayinevi]);
       return redirect()->route('YayinEviListe')->with('status','Yayinevi Başarıyla Düzenlendi');
    }
    else{
        return redirect()->route('YayinEviListe')->with('hata','Yayinevi Düzenlenemedi');
    }
   }

   public function delete($id){
    $c = YayinEvi::where('id', '=', $id)->count();
    if($c!=0){
        $delete = YayinEvi::where('id', '=', $id)->delete();
        return redirect()->back();
    }
   
   else{
        return redirect('/');
       }
    }
}
