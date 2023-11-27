<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    public function index(){
        $data = Slider::paginate(10);
        return view('admin.slider.index',['data' => $data]);
    }

    public function add(){
        return view('admin.slider.add');
    }

    public function create(Request $request){
        $request->validate(["sliderImage" => 'required',
                            'image',
                            'mimes:jpg,png,jpeg,gif,svg',
                            'dimensions:min_width=100,min_height=100,max_width=1500,max_height=1000',
                            
                        ]);
        $sliderImage = $request->image;
        $sliderImage =rand(1,1000).".".$request->sliderImage->getClientOriginalExtension();
        $yukle = $request->sliderImage->move(public_path('front\images'),$sliderImage);
        $insert = Slider::create(["name"=> $sliderImage]);
        if($sliderImage!=""){
        if($insert){
            return redirect()->route('SliderEkle')->with('status','Slider Başarıyla Eklendi');
        }
        else{
            return redirect()->route('SliderEkle')->with('hata','Slider Ekleme Başarısız. Daha Önce Eklenmiş Olabilir.');
        }
    }
    else{
        return redirect()->route('SliderEkle')->with('hata','Slider Ekleme Başarısız');
        }
    }

    public function edit($id){
        $control = Slider::where('id', '=', $id)->count();
        if ($control != 0) {
            $data = Slider::where('id', '=', $id)->get();
            return view('admin.Slider.edit', ['data' => $data]);
           
        } else {
            return redirect()->back();
        }
       
    }
    public function update(Request $request)
    {
        $id = $request->route('id');
        $control = Slider::where('id', '=', $id)->count();
        if ($control != 0) {
            $data = Slider::where('id', '=', $id)->get();
            $sliderImage = $request->sliderImage;
            if ($request->hasFile('sliderImage')) {
                $sliderImage = rand(1, 10000) . "." . $request->sliderImage->getClientOriginalExtension();
                $yukle = $request->sliderImage->move(public_path('front\images'), $sliderImage);
            } else {
                $sliderImage = DB::table('slider')
                    ->where('id', '=', $id)
                    ->value('name');
            }
            $update = Slider::where('id', '=', $id)
                ->update([
                        "name" => $sliderImage,
                ]);
            return redirect()->route('SliderListe')->with('status', 'Slider Başarıyla Düzenlendi');
        } else {
            return redirect()->route('SliderListe')->with('hata', 'Slider Düzenlenemedi');
        }
    }
 

    public function delete($id){
        $data = Slider::where('id', "=",$id)->delete();
        return redirect()->route('SliderListe');
    }

}
