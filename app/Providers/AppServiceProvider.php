<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;
use Illuminate\Support\Facades\Blade;

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
            return "<?php echo with{$expression} ? with{$expression}->format('m/d/Y') : null ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
