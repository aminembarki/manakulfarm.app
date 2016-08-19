<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatment';
    public $typeList = [
        'pregnancy_diagnose' => 'pregnancy_diagnose',
        'breeding' => 'breeding',
        'medication' => 'medication',
        'vaccination' => 'vaccination',
        'accident' => 'accident',
        'other' => 'other',
    ];
}
