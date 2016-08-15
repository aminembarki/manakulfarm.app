<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Herd;

class HerdController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $herds = Herd::all();
        return view('herd.index', compact('herds'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Herd  $herd
     * @return \Illuminate\Http\Response
     */
    public function show(Herd $herd)
    {
        return view('herd.show', compact('herd'));
    }
}
