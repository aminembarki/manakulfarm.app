<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Breeding;
use App\Http\Requests\BreedingRequest;

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
     * @param  \App\Http\Requests\BreedingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreedingRequest $request)
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
        return $this->edit($breeding);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Breeding    $breeding
     * @return \Illuminate\Http\Response
     */
    public function edit(Breeding $breeding)
    {
        return view('breeding.edit', compact('breeding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BreedingRequest $request
     * @param  \App\Breeding  $breeding
     * @return \Illuminate\Http\Response
     */
    public function update(BreedingRequest $request, Breeding $breeding)
    {
        $params = $request->all();
        $params['breeding_id'] = $this->findOrCreateBreeder($params['breeder_id']);
        $params['calving_date'] = $params['calving_date'] ?: null;
        $params['dry_date'] = $params['dry_date'] ?: null;
        $breeding->update($params);
        return redirect( route('breeding.show', ['breeding' => $breeding]) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Breeding  $breeding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breeding $breeding)
    {
        $breeding->delete();
        return redirect( route('breeding.index') );
    }
}
