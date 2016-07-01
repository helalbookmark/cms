<?php

namespace Cms\Providers;

use Cms\View\ThemeViewFinder;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // $this->app['view']->setFinder($this->app['theme.finder']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
        
        $this->singleton('theme.finder',function($app){
            $finder =new ThemeViewFinder( $app['files'],$app['config']['view.paths']);
            $config = $app['config']['cms.theme'];
            $finder -> setBasePath($app['path.public']."/".config['folder']);
            $finder -> setActiveTheme($config['active']);
            return $finder;
        });
    }
}
