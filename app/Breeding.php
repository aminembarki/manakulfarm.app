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
     * UNCONFIRM ─┬─> PREGNANT ─┬─> LACTATE ───> DRY
     *            └─> INFERTILE └─> ABORT
     */
    protected $statusList = [
        'UNCONFIRM' => [
            'status' => 'UNCONFIRM',
            'name' => 'Unconfirm',
            'possible' => ['PREGNANT', 'INFERTILE'],
            'btn' => 'btn-default',
        ],
        'INFERTILE' => [
            'status' => 'INFERTILE',
            'name' => 'Infertile',
            'possible' => [],
            'btn' => 'btn-danger',
            'icon' => 'fa-times',
        ],
        'PREGNANT' => [
            'status' => 'PREGNANT',
            'name' => 'Pregnant',
            'possible' => ['LACTATE', 'ABORT'],
            'btn' => 'btn-primary',
            'icon' => 'fa-check',
        ],
        'LACTATE' => [
            'status' => 'LACTATE',
            'name' => 'Lactate',
            'possible' => ['DRY'],
            'btn' => 'btn-primary',
            'icon' => 'fa-check',
        ],
        'ABORT' => [
            'status' => 'ABORT',
            'name' => 'Abort',
            'possible' => [],
            'btn' => 'btn-danger',
            'icon' => 'fa-times',
        ],
        'DRY' => [
            'status' => 'DRY',
            'name' => 'Dry',
            'possible' => [],
            'btn' => 'btn-default',
        ],
    ];

    protected $uncompleteStatus = ['UNCONFIRM', 'PREGNANT', 'LACTATE'];
    protected $completeStatus = ['DRY', 'INFERTILE', 'ABORT'];

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
            $this->calving_date = $this->service_date->copy()->addDays($this->calvingDays);
        if ($this->dry_date == null)
            $this->dry_date = $this->calving_date->copy()->addDays($this->milkingDays);
    }

    public function scopeUncomplete($query) {
        return $query->whereIn('status', $this->uncompleteStatus);
    }

    public function getCalvingDate() {
        if (in_array($this->status, ['LACTATE', 'ABORT', 'DRY']))
            return $this->calving_date;
        return null;
    }

    public function getDryDate() {
        if ($this->status == 'DRY')
            return $this->dry_date;
        return null;
    }

    public function getStatusName() {
        if (isset($this->statusList[$this->status]))
            return $this->statusList[$this->status]['name'];
        return null;
    }

    public function getPossibleStatus() {
        return array_map(function($status) {
            return $this->statusList[$status];
        }, $this->statusList[$this->status]['possible']);
    }
}
