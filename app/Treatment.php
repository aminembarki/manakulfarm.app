<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatment';
    protected $fillable = ['cow_id', 'start_date', 'end_date', 'type', 'summary', 'in_charge', 'cost', 'done'];
    public $typeList = [
        'pregnancy_diagnose' => 'pregnancy_diagnose',
        'breeding' => 'breeding',
        'medication' => 'medication',
        'vaccination' => 'vaccination',
        'accident' => 'accident',
        'other' => 'other',
    ];
}
