<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cow;

class Treatment extends Model
{
    protected $table = 'treatment';
    protected $fillable = ['cow_id', 'date', 'type', 'summary', 'in_charge', 'cost', 'done', 'treatable_id', 'treatable_type'];
    protected $dates = ['date'];

    public $typeList = [
        'BREEDING' => 'Breeding',
        'PREGNANCY_DIAGNOSE' => 'Pregnancy Diagnose',
        'MEDICATION' => 'Medication',
        'VACCIANTION' => 'Vaccination',
        'ACCIDENT' => 'Accident',
        'OTHER' => 'Other',
    ];

    public function cow() {
        return $this->belongsTo(Cow::class);
    }

    public function treatable()
    {
        return $this->morphTo();
    }

    public function getTypeName()
    {
        return $this->typeList[$this->type];
    }
}
