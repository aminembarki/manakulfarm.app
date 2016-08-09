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
     * UNCONFIRMED ─┬─> PREGNANT ─┬─> CALVING ───> DRY
     *              └─> INFERTILE └─> ABORTION
     */
    protected $statusList = [
        ['status' => 'UNCONFIRMED', 'name' => 'unconfirmed', 'possible' => ['PREGNANT', 'INFERTILE']],
        ['status' => 'INFERTILE', 'name' => 'infertile', 'possible' => []],
        ['status' => 'PREGNANT', 'name' => 'pregnant', 'possible' => ['CALVING', 'ABORTION']],
        ['status' => 'CALVING', 'name' => 'calving', 'possible' => ['DRY']],
        ['status' => 'ABORTION', 'name' => 'abortion', 'possible' => []],
        ['status' => 'DRY', 'name' => 'dry', 'possible' => []],
    ];

    protected $calvingDays = 283;
    protected $milkingDays = 305;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($breeding) {
            $breeding->setPregnancyDate();
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

    public function setPregnancyDate() {
        if ($this->calving_date == null)
            $this->calving_date = $this->forcastCalvingDate();
        if ($this->dry_date == null)
            $this->dry_date = $this->forcastDryDate();
    }

    public function forcastCalvingDate() {
        return $this->service_date->copy()->addDays($this->calvingDays);
    }

    public function forcastDryDate() {
        $calvingDate = $this->calving_date ?: $this->forcastCalvingDate();
        return $calvingDate->copy()->addDays($this->milkingDays);
    }
}
