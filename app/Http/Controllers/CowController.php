<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Cow;
use App\Breeder;
use App\Http\Requests\CowCreateRequest;

class CowController extends Controller
{
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cow = new Cow;
        return view('cow.create', compact('cow', 'herds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CowCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CowCreateRequest $request)
    {
        $params = $request->all();

        if ($params['breeder_id']) {
            if ($breeder = Breeder::find($params['breeder_id']));
            elseif($breeder = Breeder::where('name', $params['breeder_id'])->first());
            $breeder = Breeder::create(['name' => $params['breeder_id']]);

            $params['breeder_id'] = $breeder->id;
        } else {
            $params['breeder_id'] = null;
        }

        $cow = Cow::create($params);

        return redirect( route('cow.show', ['cow' => $cow]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
