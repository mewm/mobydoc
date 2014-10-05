<?php namespace Mobydoc\Providers;

use Illuminate\Support\ServiceProvider;

class DocumentationServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'\\Mobydoc\\Documentation\\DocumentationServiceInterface',
			'\\Mobydoc\\Documentation\\DocumentationService'
		);
	}

}
