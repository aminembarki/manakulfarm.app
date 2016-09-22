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

    public function breedingsByStatus($status) {
        $breedings = Breeding::where('status', $status)->get();
        $this->attachData($breedings);
        return $breedings;
    }

    public function treatmentsNotDone() {
        $treatments = Treatment::where('done', false)->get();
        $this->attachData($treatments);
        return $treatments;
    }
}