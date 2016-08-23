<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Breeding;
use App\Treatment;
use App\Http\Requests\BreedingRequest;

class BreedingController extends Controller
{
    use BreederTrait;

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
        $breedings = Breeding::all();
        return view('breeding.index', compact('breedings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $breeding = new Breeding;

        if ($treatmentId = $request->input('treatment_id')) {
            $treatment = Treatment::findOrFail($treatmentId);
            $breeding->cow_id = $treatment->cow_id;
            $breeding->service_date = $treatment->date;
            $breeding->in_charge = $treatment->in_charge;
            return view('breeding.create', compact('breeding', 'treatment'));
        }

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

        if ($treatmentId = $request->input('treatment_id')) {
            $treatment = Treatment::findOrFail($treatmentId);
            $treatment->treatable()->associate($breeding)->save();
            return redirect( route('treatment.show', ['treatment' => $treatment]) );
        }

        if ($request->input('with_treatments'))
            $breeding->createTreatments();

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
        return view('breeding.show', compact('breeding'));
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

    public function updateStatus(Request $request, Breeding $breeding, $status)
    {
        if ( in_array($status, $breeding->calvingStatus) ) {
            $this->validate($request, ['date' => 'required']);
            if ($status == 'DRY') {
                $breeding->dry_date = $request->input('date');
            } else {
                $breeding->calving_date = $request->input('date');
                $breeding->dry_date = $breeding->calcDryDate();
            }
        }
        $breeding->status = $status;
        $breeding->save();
        return back();
    }
}
