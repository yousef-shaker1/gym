<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\Section;
use App\Models\rale_offer;
use Illuminate\Http\Request;

class RaleOfferController extends Controller
{
    function __construct()
    {
    $this->middleware('permission:عرض السعر', ['only' => ['show']]);
    $this->middleware('permission:اضافة سعر', ['only' => ['create','store']]);
    $this->middleware('permission:تعديل سعر', ['only' => ['edit','update']]);
    $this->middleware('permission:حذف سعر', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = $request->validate([
            'subscription_id' => 'required',
            'price' => 'required|numeric',
        ]);
        rale_offer::create([
            'offer_id' => $request->subscription_id,
            'section_id' => $request->section_id,
            'price' => $request->price,
        ]);
        session()->flash('message', 'price created success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rale_offers = rale_offer::where('section_id',$id)->with('section', 'offer')->orderBy('price')->get();
        $offers = offer::get();
        $section = Section::find($id);
        return view('admin.rale_offer', compact('rale_offers', 'offers','section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $date = $request->validate([
            'offer_id' => 'required',
            'price' => 'required|numeric',
        ]);
        rale_offer::where('id', $request->id)->update([
            'offer_id' => $request->offer_id,
            'price' => $request->price,
        ]);
        session()->flash('message', 'price updated success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        rale_offer::where('id',$request->id)->delete();
        session()->flash('delete', 'price deleted success');
        return redirect()->back();
    }
}
