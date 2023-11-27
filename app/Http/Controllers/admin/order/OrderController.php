<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy("created_at","desc")->paginate(10);
        return view("admin.order.index", ["orders"=> $orders]);
    }
    public function detail($id)
    {
        // chatGPT ile yazıldı.
        try {
            $order = Order::findOrFail($id);
            return view('admin.order.detail', ['data' => $order]);
        } catch (ModelNotFoundException $e) {
            return redirect('index')->with('error', 'Sipariş bulunamadı');
        }
}

public function delete($id){
    $c = Order::where('id', '=', $id)->count();
    if($c!=0){
        $delete = Order::where('id', '=', $id)->delete();
        return redirect()->back();
    }
   
   else{
        return redirect('/');
       }
    }
}