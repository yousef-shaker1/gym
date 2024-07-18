<?php

namespace App\Http\Controllers;

use App\Models\day;
use App\Models\time;
use App\Models\Section;
use Illuminate\Http\Request;

class TimeController extends Controller
{

    function __construct()
    {
    $this->middleware('permission:مواعيد الالعاب', ['only' => ['index']]);
    $this->middleware('permission:اضافة معاد', ['only' => ['create','store']]);
    $this->middleware('permission:تعديل معاد', ['only' => ['edit','update']]);
    $this->middleware('permission:حذف معاد', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $times = time::with('day', 'section')->orderBy('section_id')->paginate(8);
        $sections = Section::get();
        $days = day::get();
        return view('admin.time', compact('times', 'sections', 'days'));
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
        $validatedData = $request->validate([
            'section_id' => 'required',
            'day_id' => 'required',
            'time' => 'required',
        ]);
        
        $existingRecord = time::where('day_id', $validatedData['day_id'])
        ->where('time', $validatedData['time'])
        ->first();

    if ($existingRecord) {
        session()->flash('delete', 'The combination of section, day, and time already exists');
        return redirect()->back();
    } else {
        time::create($validatedData);
        session()->flash('message', 'time create successfully');
        return redirect()->back();
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $validatedData = $request->validate([
            'section_id' => 'required',
            'day_id' => 'required',
            'time' => 'required',
        ]);
        
        $existingRecord = time::where('day_id', $validatedData['day_id'])
        ->where('time', $validatedData['time'])
        ->first();

    if ($existingRecord) {
        session()->flash('delete', 'The combination of section, day, and time already exists');
        return redirect()->back();
    } else {
        $thime = time::where('id', $request->id)->update($validatedData);
        session()->flash('message', 'time updated successfully');
        return redirect()->back();
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        time::where('id', $request->id)->delete();
        session()->flash('delete', 'time deleted successfully');
        return redirect()->back();
    }
}
