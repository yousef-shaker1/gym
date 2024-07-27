<?php

namespace App\Http\Controllers\api;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MessageResponce;

class MessageController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $messages = MessageResponce::collection(Message::all());
        return $this->apiResponse($messages,'ok', 200);
    }

    public function show(Request $request, $id){
        $message = Message::find($id);
        if(!$message){
            return $this->apiResponse(null, 'message not found', 404);
        }
        return $this->apiResponse(new MessageResponce($message),'ok', 200);
    }

    public function delete($id){
        $message = Message::find($id);
        if(!$message){
            return $this->apiResponse(null, 'message not found', 404);
        }
        $message->delete();
        return $this->apiResponse(null, 'message delete success', 404);
    }
}
