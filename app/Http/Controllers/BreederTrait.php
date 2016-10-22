<?php

namespace App\Http\Controllers;

use App\Breeder;

trait BreederTrait {

    public function findOrCreateBreeder(&$breederId) {
        if ($breederId) {
            if ($breeder = Breeder::find($breederId));
            elseif($breeder = Breeder::where('name', $breederId)->first());
            else $breeder = Breeder::create(['name' => $breederId]);
            return $breederId = $breeder->id;
        }

        return null;
    
    }

}