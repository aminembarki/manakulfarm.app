<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Treatment;

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
            'icon' => 'fa-circle-o'
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
            'icon' => 'fa-circle-o'
        ],
    ];

    public $uncompleteStatus = ['UNCONFIRM', 'PREGNANT', 'LACTATE'];
    public $completeStatus = ['DRY', 'INFERTILE', 'ABORT'];
    public $calvingStatus = ['LACTATE', 'ABORT', 'DRY'];

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
            $this->calving_date = $this->calcCalvingDate();
        if ($this->dry_date == null)
            $this->dry_date = $this->calcDryDate();
    }

    public function calcCalvingDate() {
        return $this->service_date->copy()->addDays($this->calvingDays);
    }

    public function calcDryDate() {
        return $this->calving_date->copy()->addDays($this->milkingDays);
    }

    public function scopeUncomplete($query) {
        return $query->whereIn('status', $this->uncompleteStatus);
    }

    public function getCalvingDate() {
        if (in_array($this->status, $this->calvingStatus))
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

    public function treatments() {
        return $this->morphMany(Treatment::class, 'treatable');
    }

    public function createTreatments() {
        $breeding = $this->treatments()->where('type', 'BREEDING')->first();
        $pregnancyDiagnose = $this->treatments()->where('type', 'PREGNANCY_DIAGNOSE')->first();

        if (!$breeding) {
            $this->treatments()->create([
                "cow_id" => $this->cow_id,
                "date" => $this->service_date->copy(),
                "type" => 'BREEDING',
                "in_charge" => $this->in_charge,
                "done" => true,
            ]);
        }

        if (!$pregnancyDiagnose) {
            $this->treatments()->create([
                "cow_id" => $this->cow_id,
                "date" => $this->service_date->copy()->addMonths(2),
                "type" => 'PREGNANCY_DIAGNOSE',
            ]);
        }
    }

    public function getFullNameAttribute()
    {
        return "{$this->breeder->name} on " . $this->service_date->format('d/m/Y');
    }
}
