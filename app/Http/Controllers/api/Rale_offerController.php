<?php

namespace App\Http\Controllers\api;

use App\Models\rale_offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Rale_offerResponce;
use Illuminate\Validation\ValidationException;

class Rale_offerController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $rale_offers = Rale_offerResponce::collection(rale_offer::all());
        return $this->apiResponse($rale_offers,'ok', 200);
    }

    public function show(Request $request, $id){
        $rale_offer = rale_offer::find($id);
        if(!$rale_offer){
            return $this->apiResponse(null, 'rale_offer not found', 404);
        }
        return $this->apiResponse(new Rale_offerResponce($rale_offer),'ok', 200);
    }

    public function store(Request $request){
        try{
            $valiate = $request->validate([
                'offer_id' => 'required|numeric',
                'section_id' => 'required|numeric',
                'price' => 'required|numeric',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $rale_offer = rale_offer::create($valiate);
        if(!$rale_offer){
            return $this->apiResponse(null, 'rale_offer not found', 404);
        }
        return $this->apiResponse(new Rale_offerResponce($rale_offer), 'rale_offer create success', 201);
    }

    public function update(Request $request, $id){
        try{
            $valiate = $request->validate([
                'offer_id' => 'nullable|numeric',
                'section_id' => 'nullable|numeric',
                'price' => 'nullable|numeric',
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $rale_offer = rale_offer::find($id);
        if(!$rale_offer){
            return $this->apiResponse(null, 'rale_offer not found', 404);
        }
        $rale_offer->update($valiate);
        return $this->apiResponse(new Rale_offerResponce($rale_offer), 'rale_offer updated success', 201);
    }

    public function delete($id){
        $rale_offer = rale_offer::find($id);
        if(!$rale_offer){
            return $this->apiResponse(null, 'rale_offer not found', 404);
        }
        $rale_offer->delete();
        return $this->apiResponse(null, 'rale_offer delete success', 404);
    }
}
