<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cow;

class Herd extends Model
{
    protected $table = 'herd';

    public function cows() {
        return $this->hasMany(Cow::class);
    }

    public function scopeActive($query) {
        return $query->where('active', true);
    }
}
