<?php

namespace App\Http\Controllers\api;

use App\Models\time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TimeResponce;
use Illuminate\Validation\ValidationException;

class TimeController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $times = TimeResponce::collection(time::all());
        return $this->apiResponse($times,'ok', 200);
    }

    public function show(Request $request, $id){
        $time = time::find($id);
        if(!$time){
            return $this->apiResponse(null, 'time not found', 404);
        }
        return $this->apiResponse(new TimeResponce($time),'ok', 200);
    }

    public function store(Request $request){
        try{
            $valiate = $request->validate([
                'section_id' => 'required|numeric',
                'day_id' => 'required|numeric',
                'time' =>'required|date_format:H:i:s'
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $time = time::create($valiate);
        if(!$time){
            return $this->apiResponse(null, 'time not found', 404);
        }
        return $this->apiResponse(new TimeResponce($time), 'time create success', 201);
    }

    public function update(Request $request, $id){
        try{
            $valiate = $request->validate([
            'section_id' => 'nullable|numeric',
            'day_id' => 'nullable|numeric',
            'time' =>'nullable|date_format:H:i:s'
            ]);
        } catch (ValidationException $e) {
            return $this->apiResponse(null, $e->errors(), 400);
        }
        $time = time::find($id);
        if(!$time){
            return $this->apiResponse(null, 'time not found', 404);
        }
        $time->update($valiate);
        return $this->apiResponse(new TimeResponce($time), 'time updated success', 201);
    }

    public function delete($id){
        $time = time::find($id);
        if(!$time){
            return $this->apiResponse(null, 'time not found', 404);
        }
        $time->delete();
        return $this->apiResponse(null, 'time delete success', 404);
    }
}
