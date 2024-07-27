<?php

namespace App\Http\Controllers\api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResponse;
use Illuminate\Validation\ValidationException;

class ProblemController extends Controller
{
    use ApirequestTrait;
    public function index(){
        $comments = CommentResponse::collection(Comment::all());
        return $this->apiResponse($comments,'ok', 200);
    }

    public function show(Request $request, $id){
        $comment = Comment::find($id);
        if(!$comment){
            return $this->apiResponse(null, 'problem not found', 404);
        }
        return $this->apiResponse(new CommentResponse($comment),'ok', 200);
    }

    public function delete($id){
        $comment = Comment::find($id);
        if(!$comment){
            return $this->apiResponse(null, 'problem not found', 404);
        }
        $comment->delete();
        return $this->apiResponse(null, 'problem delete success', 404);
    }
}

