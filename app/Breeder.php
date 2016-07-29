<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breeder extends Model
{
    protected $table = 'breeder';
    protected $fillable = ['name'];
}
