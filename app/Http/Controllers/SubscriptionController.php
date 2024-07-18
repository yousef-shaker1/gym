<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class SubscriptionController extends Controller
{
    function __construct()
    {
    $this->middleware('permission:وقت الاشتراك', ['only' => ['subscription']]);
    $this->middleware('permission:اضافة وقت', ['only' => ['save_subscription']]);
    $this->middleware('permission:اضافة وقت', ['only' => ['update_subscription']]);
    $this->middleware('permission:حذف وقت', ['only' => ['delete_subscription']]);
    }
    public function subscription(){
        $offers = offer::get();
        return view('admin.subscription',compact('offers'));
    }

    public function save_subscription(Request $request){
        $date = $request->validate([
            'name' => 'required',
        ]);
        offer::create([
            'subscription' => $request->name,
        ]);
        session()->flash('message', 'subscription create success');
        return redirect()->back();
    }

    public function update_subscription(Request $request)
    {
        $date = $request->validate([
            'name' => 'required',
        ]);
        offer::find($request->id)->update([
            'subscription' => $request->name,
        ]);
        session()->flash('message', 'subscription update success');
        return redirect()->back();
    }

    public function delete_subscription(Request $request)
    {
        offer::find($request->id)->delete();
        session()->flash('delete', 'subscription delete success');
        return redirect()->back();
    }
}
