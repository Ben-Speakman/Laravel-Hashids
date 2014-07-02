<?php namespace Alexsoft\LaravelHashids;

use Hashids\Hashids;
use Illuminate\Support\ServiceProvider;

class LaravelHashidsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('alexsoft/laravel-hashids');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('hashids', function($app) {
			return new Hashids(
				$app['config']['app.key'],
				$app['config']['laravel-hashids::length'],
				$app['config']['laravel-hashids::alphabet']
			);
		});
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
