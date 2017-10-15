<?php 

namespace Ken\Blog;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\AliasLoader;
use Ken\Blog\Facades\Litepie as LitepieWeb;

class LitepieServiceProvider extends ServiceProvider
{
	public function register()
	{
		$loader = AliasLoader::getInstance();
        	$loader->alias('Litepie', LitepieWeb::class);
		$this->app->bind('litepie', function() {
			return new Litepie();
		});
		$this->loadHelpers();
		if ($this->app->runningInConsole()) {
			$this->publishLitepie();
            	$this->litepieInstall();
        	}
	}

	public function boot()
	{
		$this->loadViewsFrom(__DIR__ . '/../resources/views/vendor/litepie/', 'litepie');

		$this->viewComposers();
	}

	protected function publishLitepie()
	{
        $publish = [
            'litepie_assets' => [
               __DIR__ . '/../public/vendor/litepie/' => public_path(config('litepie.assets_path')),
            ],
            'assets' => [
               __DIR__ . '/../public/vendor/fonts/' => public_path('fonts'),
            ],
            'config' => [
               __DIR__ . '/../config/litepie.php' => config_path('litepie.php'),
            ],
            'seeds' => [
            	__DIR__ . '/../database/seeds' => database_path('seeds'),
            ],
        ];

        foreach ($publish as $key => $value) {
            $this->publishes($value, $key);
        }
	}

	protected function viewComposers()
    	{
        	View::composer('litepie::*', 'Ken\Blog\Http\Controllers\LitepieComposer');
    	}

    	private function litepieInstall()
    	{
        	$this->commands(Console\LitepieInstall::class);
    	}

    	protected function loadHelpers()
    	{
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    	}

}
