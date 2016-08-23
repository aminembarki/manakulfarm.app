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
        'pregnancy_diagnose' => 'pregnancy_diagnose',
        'breeding' => 'breeding',
        'medication' => 'medication',
        'vaccination' => 'vaccination',
        'accident' => 'accident',
        'other' => 'other',
    ];

    public function cow() {
        return $this->belongsTo(Cow::class);
    }

    public function treatable()
    {
        return $this->morphTo();
    }
}
