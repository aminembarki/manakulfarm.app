<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Treatment;
use App\Http\Requests\TreatmentRequest;

class TreatmentController extends Controller
{
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
        $treatment = new Treatment;
        return view('treatment.create', compact('treatment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TreatmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TreatmentRequest $request)
    {
        $treatment = Treatment::create($request->all());
        return redirect( route('treatment.show', ['treatment' => $treatment]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function show(Treatment $treatment)
    {
        return $this->edit($treatment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function edit(Treatment $treatment)
    {
        return view('treatment.edit', compact('treatment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Requests\TreatmentRequest  $request
     * @param  \App\Treatment  $treatment
     */
    public function update(TreatmentRequest $request, Treatment  $treatment)
    {
        $input = $request->all();
        $input['done'] = $request->input('done', false);
        $treatment->update($input);
        return redirect( route('treatment.show', ['treatment' => $treatment]) );
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
