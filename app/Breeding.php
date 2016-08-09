<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breeding extends Model
{
    protected $table = 'breeding';
    protected $fillable = ['cow_id', 'breeder_id', 'service_date', 'in_charge', 'status', 'calving_date', 'dry_date'];
    protected $dates = ['service_date', 'calving_date', 'dry_date'];

    /**
     * unconfirmed ─┬─> pregnant ─┬─> calving
     *              └─> infertile └─> abortion
     */
    protected $statusList = [
        ['status' => 'unconfirmed','name' => 'unconfirmed','possible' => ['pregnant', 'infertile']],
        ['status' => 'infertile','name' => 'infertile','possible' => []],
        ['status' => 'pregnant','name' => 'pregnant','possible' => ['calving', 'abortion']],
        ['status' => 'calving','name' => 'calving','possible' => []],
        ['status' => 'abortion','name' => 'abortion','possible' => []],
    ];

    public function getStatusList() {
        return $this->statusList;
    }

    public function cow() {
        return $this->belongsTo('App\Cow');
    }

    public function breeder() {
        return $this->belongsTo('App\Breeder');
    }
}
