<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    function __construct()
    {
    $this->middleware('permission:اراء العملاء', ['only' => ['index']]);
    $this->middleware('permission:اراء العملاء', ['only' => ['comment_show']]);
    }
    public function index(){
        return view('admin.message');
    }
    public function send_message(Request $request)
    {
        $customer = Customer::where('email', Auth::user()->email)->first();
        Message::create([
            'customer_id' => $customer->id,
            'message' => $request->message,
        ]);
        return redirect()->back();
    }

    public function comment(Request $request)
    {
        $date =  $request->validate([
            'name' => 'required|min:2|max:20',
            'email' => 'required|email|unique:comments',
            'comment' => 'required|min:5|max:60',
        ]);
        Comment::create($date);
        session()->flash('message', 'The problem has been sent successfully');
        return redirect()->back();
    }

    public function comment_show(){
        return view('admin.comment');
    }
}
