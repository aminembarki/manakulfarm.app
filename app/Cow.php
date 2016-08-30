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

    public function uploadImages($images = []) {
        $cacheDir = 'app/public';
        foreach ($images as $image) {
            if ($image = $image->move(storage_path($cacheDir), $image->getClientOriginalName())) {
                $path = $image->getRealPath();
                try {
                    $url = app()->imgur->upload($path);
                    $this->images()->create(compact('url'));
                } catch (Exception $e) {
                    
                }
                \File::delete($path);
            }
        }
        return $this->images;
    }

    public function images() {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function defaultImageUrl() {
        return $this->images[0] ? $this->images[0]->url : url('images/cow.svg');
    }
}
