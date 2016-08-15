<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cow extends Model
{
    protected $table = 'cow';
    protected $fillable = ['name', 'serial', 'birthdate', 'herd_id', 'breeder_id', 'mother_id'];
    protected $dates = ['birthdate'];

    public function herd() {
        return $this->belongsTo('App\Herd');
    }

    public function breeder() {
        return $this->belongsTo('App\Breeder');
    }

    public function mother() {
        return $this->belongsTo('App\Cow', 'mother_id');
    }

    public function breedings() {
        return $this->hasMany('App\Breeding');
    }

    public function scopeActive($query) {
        return $query->whereHas('herd', function($q) {
            $q->where('active', true);
        });
    }
}
