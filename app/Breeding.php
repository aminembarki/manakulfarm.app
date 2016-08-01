<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breeding extends Model
{
    protected $table = 'breeding';
    protected $statuses = [
    // unconfirmed ─┬─> pregnant ─┬─> calving
    //              └─> infertile └─> abortion
    ['status' => 'unconfirmed','name' => 'unconfirmed','possible' => ['pregnant', 'infertile']],
    ['status' => 'infertile','name' => 'infertile','possible' => []],
    ['status' => 'pregnant','name' => 'pregnant','possible' => ['calving', 'abortion']],
    ['status' => 'calving','name' => 'calving','possible' => []],
    ['status' => 'abortion','name' => 'abortion','possible' => []]
    ];

    public function getStatus() {
        return $this->statuses;
    }
}
