<?php

namespace App\Http\Controllers;

use App\Models\day;
use App\Models\Team;
use App\Models\time;
use App\Models\Section;
use App\Models\rale_offer;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    function __construct()
    {
    $this->middleware('permission:القسم', ['only' => ['index']]);
    
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sections');
    }

    public function show_section($id)
    {
        $section = Section::findorfail($id);
        $raleoffers = rale_offer::where('section_id', $section->id)->orderby('offer_id')->get();
        $time = time::where('section_id', $section->id)->get();
        $days = day::get();
        $caption = Team::get();
        return view('user.single_section', compact( 'section', 'raleoffers', 'time', 'days', 'caption'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        //
    }
}
