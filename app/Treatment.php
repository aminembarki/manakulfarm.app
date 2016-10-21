<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cow;

class Treatment extends Model
{
    protected $table = 'treatment';
    protected $fillable = ['cow_id', 'date', 'type', 'summary', 'in_charge', 'cost', 'done', 'treatable_id', 'treatable_type'];
    protected $dates = ['date'];

    public function getTypeList() {
        return [
            'BREEDING' => trans('m.breeding'),
            'PREGNANCY_DIAGNOSE' => trans('m.pregnancyDiagnose'),
            'MEDICATION' => trans('m.medication'),
            'VACCIANTION' => trans('m.vacciantion'),
            'ACCIDENT' => trans('m.accident'),
            'OTHER' => trans('m.other'),
        ];
    }

    public function cow() {
        return $this->belongsTo(Cow::class);
    }

    public function treatable()
    {
        return $this->morphTo();
    }

    public function getTypeName()
    {
        return $this->getTypeList()[$this->type];
    }
}
