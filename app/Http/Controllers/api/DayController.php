<?php

namespace App\Http\Controllers\api;

use App\Models\day;
use Illuminate\Http\Request;
use App\Http\Resources\DayResponce;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class DayController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $days = DayResponce::collection(day::all());
        return $this->apiResponse($days,'ok', 200);
    }

    public function show(Request $request, $id){
        $day = day::find($id);
        if(!$day){
            return $this->apiResponse(null, 'day not found', 404);
        }
        return $this->apiResponse(new DayResponce($day),'ok', 200);
    }
}
