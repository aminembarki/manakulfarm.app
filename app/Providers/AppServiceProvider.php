<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;
use Illuminate\Support\Facades\Blade;

use Doctrine\Common\Cache\FilesystemCache;
use RemoteImageUploader\Factory as RemoteImageUploaderFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('bsErrors', 'bootstrap.errors', ['errors']);
        Form::component('bsModalDelete', 'bootstrap.modalDelete', ['url', 'id', 'header', 'body']);

        Blade::directive('date', function($expression) {
            return "<?php echo with{$expression} ? with{$expression}->format('d/m/Y') : null ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('imgur', function ($app) {
            $cacher = new FilesystemCache( storage_path('framework/cache') );
            $uploader = RemoteImageUploaderFactory::create('Imgur', array(
                'cacher'         => $cacher,
                'api_key'        => env('IMGUR_API_KEY'),
                'api_secret'     => env('IMGUR_API_SECRET'),
                'auto_authorize' => true,
                'username'       => env('IMGUR_USERNAME'),
                'password'       => env('IMGUR_PASSWORD'),
            ));
            $uploader->authorize();
            return $uploader;
        });
    }
}
