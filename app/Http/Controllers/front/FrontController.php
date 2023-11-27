<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kitap;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class FrontController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function search(){
        $q = request('q');

    if (!empty($q)) {
        
        $q = strip_tags($_GET['q']);
        $data = Kitap::where('name','LIKE','%'.$q. '%')->paginate(10);
    
    return view('front.search', ['data' => $data]);
  }
  else{
    return redirect("index")->with("error","Aradığınız sonuç bulunamadı");
  }
}
    

}
