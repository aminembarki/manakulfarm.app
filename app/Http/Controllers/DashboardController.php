<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Herd;
use App\Breeding;
use App\Treatment;

class DashboardController extends Controller
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

    private function attachData(&$collection) {
        $collection = $collection->map(function($model) {
            switch (get_class($model)) {
                case Treatment::class:
                    $model->url = route('treatment.show', ['treatment' => $model]);
                    $model->typeName = $model->getTypeName();
                    break;

                case Breeding::class:
                    $model->url = route('breeding.show', ['breeding' => $model]);
                    $model->breeder;
                    break;
            }
            $model->cows;
            $model->cow;
            return $model;
        });
    }

    public function herds() {
        $herds = Herd::active()->get();
        $this->attachData($herds);
        return $herds;
    }

    public function treatmentsNotDone() {
        $treatments = Treatment::where('done', false)->orderBy('date')->get();
        $this->attachData($treatments);
        return $treatments;
    }

    public function breedingsPregnant() {
        $breeding = Breeding::where('status', 'PREGNANT')->orderBy('calving_date')->get();
        $this->attachData($breeding);
        return $breeding;
    }
}
