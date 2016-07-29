<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cow extends Model
{
    protected $table = 'cow';
    protected $fillable = ['name', 'serial', 'birthdate', 'herd_id', 'breeder_id', 'mother_id'];
    protected $dates = ['birthdate'];
}
