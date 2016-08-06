<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Breeding;
use App\Http\Requests\BreedingCreateRequest;

class BreedingController extends Controller
{
    use BreederTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breeding = new Breeding;
        return view('breeding.create', compact('breeding'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreedingCreateRequest $request)
    {
        $params = $request->all();
        $params['breeding_id'] = $this->findOrCreateBreeder($params['breeder_id']);
        $breeding = Breeding::create($params);
        return redirect( route('breeding.show', ['breeding' => $breeding]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Breeding    $breeding
     * @return \Illuminate\Http\Response
     */
    public function show(Breeding $breeding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
