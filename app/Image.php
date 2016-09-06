<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $fillable = ['url'];

    static public function upload($file) {
        $cacheDir = storage_path('app/public');
        $file = $file->move($cacheDir, $file->getClientOriginalName());
        if ($file) {
            $path = $file->getRealPath();
            try {
                $url = app()->imgur->upload($path);
            } catch (Exception $e) {

            }
            \File::delete($path);
        }
        return isset($url) ? $url : false;
    }
}
