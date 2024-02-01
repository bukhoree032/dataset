<?php

namespace Modules\Aside\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\View;

use Modules\Aside\Entities\Aside;

class AsideServiceProvider extends ServiceProvider
{
    private function getViewComposer(){
        View::composer(['admin::layouts.aside'], function ($view) {
            $cache_navigations =  Aside::getNavigationSidebar();

            return $view->with(compact('cache_navigations'));
        });
    }

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Aside', 'Database/Migrations'));
        $this->getViewComposer();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Aside', 'Config/config.php') => config_path('aside.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Aside', 'Config/config.php'), 'aside'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/aside');

        $sourcePath = module_path('Aside', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(\Config::get('view.paths'), [$sourcePath]), 'aside');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/aside');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'aside');
        } else {
            $this->loadTranslationsFrom(module_path('Aside', 'Resources/lang'), 'aside');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Aside', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
