<?php

namespace App\Http\Controllers;

use App\Breeder;

trait BreederTrait {

    public function findOrCreateBreeder($breeder) {

        if ($breeder) {
            if ($breeder = Breeder::find($breeder));
            elseif($breeder = Breeder::where('name', $breeder)->first());
            else $breeder = Breeder::create(['name' => $breeder]);
            return $breeder->id;
        }

        return null;
    
    }

}