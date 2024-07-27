<?php

namespace App\Http\Controllers\api;

use App\Models\offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriptionResponce;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $subscriptions = SubscriptionResponce::collection(offer::all());
        return $this->apiResponse($subscriptions,'ok', 200);
    }

    public function show(Request $request, $id){
        $subscription = offer::find($id);
        if(!$subscription){
            return $this->apiResponse(null, 'subscription not found', 404);
        }
        return $this->apiResponse(new SubscriptionResponce($subscription),'ok', 200);
    }

    public function store(Request $request){
        try{
            $valiate = $request->validate([
                'subscription' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $subscription = offer::create($valiate);
        if(!$subscription){
            return $this->apiResponse(null, 'subscription not found', 404);
        }
        return $this->apiResponse(new SubscriptionResponce($subscription), 'subscription create success', 201);
    }

    public function update(Request $request, $id){
        try{
            $valiate = $request->validate([
                'subscription' => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $subscription = offer::find($id);
        if(!$subscription){
            return $this->apiResponse(null, 'subscription not found', 404);
        }
        $subscription->update($valiate);
        return $this->apiResponse(new SubscriptionResponce($subscription), 'subscription updated success', 201);
    }

    public function delete($id){
        $subscription = offer::find($id);
        if(!$subscription){
            return $this->apiResponse(null, 'subscription not found', 404);
        }
        $subscription->delete();
        return $this->apiResponse(null, 'subscription delete success', 404);
    }
}
