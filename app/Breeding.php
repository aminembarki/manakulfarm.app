<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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

    protected $calvingDays = 283;
    protected $milkingDays = 305;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($breeding) {
            $breeding->calcPregnancyDate();
            return true;
        });
    }

    public function getStatusList() {
        return $this->statusList;
    }

    public function cow() {
        return $this->belongsTo('App\Cow');
    }

    public function breeder() {
        return $this->belongsTo('App\Breeder');
    }

    public function calcPregnancyDate() {
        if ($this->calving_date == null)
            $this->calving_date = $this->service_date->copy()->addDays($this->calvingDays);
        if ($this->dry_date == null)
            $this->dry_date = $this->calving_date->copy()->addDays($this->milkingDays);
    }
}
