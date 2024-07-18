<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    function __construct()
    {
    $this->middleware('permission:الفريق', ['only' => ['index']]);
    
    }
    public function index(){
        return view('admin.team');
    }
}
