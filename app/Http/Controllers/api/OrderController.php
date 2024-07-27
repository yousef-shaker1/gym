<?php

namespace App\Http\Controllers\api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResponce;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    use ApirequestTrait;

    public function index(){
        $orders = OrderResponce::collection(Order::all());
        return $this->apiResponse($orders,'ok', 200);
    }

    public function show(Request $request, $id){
        $order = Order::find($id);
        if(!$order){
            return $this->apiResponse(null, 'order not found', 404);
        }
        return $this->apiResponse(new OrderResponce($order),'ok', 200);
    }

    public function store(Request $request){
        try{
            $valiate = $request->validate([
                'customer_id' => 'required',
                'day' => 'required',
                'rale_offer_id' => 'required',
                'status' => 'required',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $order = Order::create($valiate);
        if(!$order){
            return $this->apiResponse(null, 'order not found', 404);
        }
        return $this->apiResponse(new OrderResponce($order), 'order create success', 201);
    }

    public function accept_order($id){
        $order = Order::find($id);
        if(!$order){
            return $this->apiResponse(null, 'order not found', 404);
        }
        $order->update([
            'status' => 'قبول',
        ]);
        return $this->apiResponse(new OrderResponce($order), 'order accept success', 200);
    }

    public function reject_order($id){
        $order = Order::find($id);
        if(!$order){
            return $this->apiResponse(null, 'order not found', 404);
        }
        $order->update([
            'status' => 'رفض',
        ]);
        return $this->apiResponse(new OrderResponce($order), 'order reject success', 404);
    }

    public function delete($id){
        $order = Order::find($id);
        if(!$order){
            return $this->apiResponse(null, 'order not found', 404);
        }
        $order->delete();
        return $this->apiResponse(null, 'order delete success', 404);
    }
}
