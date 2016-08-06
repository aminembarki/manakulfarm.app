<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cow;
use App\Breeder;
use App\Http\Requests\CowRequest;

class CowController extends Controller
{
    use BreederTrait;

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
        $cows = Cow::all();
        return view('cow.index', compact('cows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cow = new Cow;
        return view('cow.create', compact('cow'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CowRequest $request)
    {
        $params = $this->params($request);
        $cow = Cow::create($params);
        return redirect( route('cow.show', ['cow' => $cow]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cow $cow
     * @return \Illuminate\Http\Response
     */
    public function show(Cow $cow)
    {
        return $this->edit($cow);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cow $cow
     * @return \Illuminate\Http\Response
     */
    public function edit(Cow $cow)
    {
        return view('cow.edit', compact('cow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CowRequest  $request
     * @param  \App\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function update(CowRequest $request, Cow $cow)
    {
        $params = $request->all();
        $params['birthdate'] = $params['birthdate'] ?: null;
        $params['breeder_id'] = $this->findOrCreateBreeder($params['breeder_id']);
        $cow->update($params);
        return redirect( route('cow.show', ['cow' => $cow]) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cow  $cow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cow $cow)
    {
        $cow->delete();
        return redirect( route('cow.index') );
    }
}
