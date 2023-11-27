<?php

namespace App\Http\Controllers\front\kitap;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kitap;

class KitapDetayController extends Controller
{
    public function index($selflink){
        $control = Kitap::where("selflink", $selflink)->count();
        if( $control != 0){
            $w = Kitap::where("selflink", $selflink)->get();
            return view("front.kitap.index",['data'=>$w]);
        }
        else{
            return redirect('index');
        }
    }
}
