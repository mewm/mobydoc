<?php namespace Mobydoc\Providers;

use Illuminate\Support\ServiceProvider;

class StorageServiceProvider extends ServiceProvider {

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
			'Mobydoc\\Storage\\FileRepository',	
			'Mobydoc\\Storage\\FileRepositoryInterface'	
		);
	}

}
