<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as Intervention;

class Image extends Model
{
    protected $table = 'image';
    protected $fillable = ['url'];

    static public function upload($file) {
        $path = storage_path('app/public/'.$file->getClientOriginalName());
        $image = Intervention::make($file->getRealPath());

        $fn = $image->height() > $image->width() ? 'heighten' : 'widen';
        call_user_func([$image, $fn], 800, function ($constraint) {
            $constraint->upsize();
        });

        if ( $image->save($path) ) {

            try {
                $url = app()->imgur->upload($path);
            } catch (\Exception $e) {

            }

            \File::delete($path);

        }

        return isset($url) ? $url : false;
    }
}
