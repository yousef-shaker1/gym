<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\rale_offer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function __construct()
    {
    $this->middleware('permission:الاوردرات', ['only' => ['index']]);
    $this->middleware('permission:قبول الاوردر', ['only' => ['accept_order']]);
    $this->middleware('permission:رفض الاوردر', ['only' => ['reject_order']]);
    $this->middleware('permission:حذف الاوردر', ['only' => ['delete']]);
    }
    public function show_order(){

        $orders = Order::with('customer', 'rale_offer')->paginate(7);

        return view('admin.orders', compact('orders'));
    }

    public function delete(Request $request,$id){
        Order::findorfail($request->id)->delete();
        session()->flash('delete', 'order deleted success');
        return redirect()->back();
    }

    public function accept_order($id){
        Order::findorfail($id)->update([
            'status' => 'قبول',
        ]);
        return redirect()->back();
    }
    public function reject_order($id){
        Order::findorfail($id)->update([
            'status' => 'رفض',
        ]);
        return redirect()->back();
    }
}
