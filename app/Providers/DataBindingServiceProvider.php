<?php

namespace App\Providers;

use App\Helper\DataBinder;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class DataBindingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('bindData', function ($bind) {
            return '<?php app(\App\Helper\DataBinder::class)->bind(' . $bind . '); ?>';
        });
        Blade::directive('endBindData', function () {
            return '<?php app(\App\Helper\DataBinder::class)->pop(); ?>';
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(DataBinder::class, fn () => new DataBinder());
    }
}
