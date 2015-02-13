<?php namespace Alexsoft\LaravelHashids;

use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class LaravelHashidsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([ 
			__DIR__.'/config/config.php' => config_path('laravel-hashids.php') 
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('laravel-hashids', function ($app) {
			return new Hashids(
				$app['config']['app.key'],
				$app['config']['laravel-hashids.length'],
				$app['config']['laravel-hashids.alphabet']
			);
		});

		$this->app->bind('Hashids\HashGenerator', function($app)
		{
			return $app['laravel-hashids'];
		});
		
		$this->mergeConfigFrom(__DIR__.'/config/config.php', 'laravel-hashids');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['laravel-hashids'];
	}

}
