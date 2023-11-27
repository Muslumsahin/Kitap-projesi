<?php

namespace App\Http\Controllers\admin\Yazar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Yazar;


class YazarController extends Controller
{
    public function index()
    {

        $data = Yazar::paginate(10);
        return view('admin.Yazar.list', ['data' => $data]);
    }

    public function add()
    {
        return view('admin.Yazar.add');
    }

    public function create(Request $request)
    {
        $yazarName = $request->yazarName;
        $yazarBio = $request->yazarBio;
        $request->validate([
            "yazarName" => 'required|string',
        ]);

        $selflink = Str::of($yazarName)->slug('-');
        $kontrol = Yazar::whereSelflink($selflink)->first();

        if ($kontrol) {
            return redirect()->route('YazarEkle')->with('hata', 'Yazar Ekleme Başarısız. Daha Önce Eklenmiş Olabilir.');
        } else {
            $yazarImage = rand(1, 1000) . "." . $request->yazarImage->getClientOriginalExtension();
            $yukle = $request->yazarImage->move(public_path('admin\assets\images'), $yazarImage);
            Yazar::create([
                "name" => $yazarName,
                "selflink" => $selflink,
                "image" => $yazarImage,
                "bio" => $yazarBio
            ]);
            return redirect()->route('YazarEkle')->with('status', 'Yazar Başarıyla Eklendi');
        }
    }
    public function edit($id)
    {
        $control = Yazar::where('id', '=', $id)->count();
        if ($control != 0) {
            $data = Yazar::where('id', '=', $id)->get();
            return view('admin.yazar.edit', ['data' => $data]);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $id = $request->route('id');
        $control = Yazar::where('id', '=', $id)->count();
        if ($control != 0) {
            $data = Yazar::where('id', '=', $id)->get();
            $yazarName = $request->yazarName;
            $yazarBio = $request->yazarBio;
            $selflink = Str::of($yazarName)->slug('-');
            if ($request->hasFile('yazarImage')) {
                $yazarImage = rand(1, 10000) . "." . $request->yazarImage->getClientOriginalExtension();
                $yukle = $request->yazarImage->move(public_path('admin\assets\images'), $yazarImage);
            } else {
                $yazarImage = DB::table('yazars')
                    ->where('id', '=', $id)
                    ->value('image');
            }
            $update = Yazar::where('id', '=', $id)
                ->update(
                    [
                        'name' => $yazarName,
                        'image' => $yazarImage,
                        'selflink' => $selflink,
                        'bio' => $yazarBio,
                    ]
                );
            return redirect()->route('YazarListe')->with('status', 'Yazar Başarıyla Düzenlendi');
        } else {
            return redirect()->route('YazarListe')->with('hata', 'Yazar Düzenlenemedi');
        }
    }
    public function delete($id)
    {
        $c = Yazar::where('id', '=', $id)->count();
        if ($c != 0) {
            $delete = Yazar::where('id', '=', $id)->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
