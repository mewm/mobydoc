<?php namespace MobyDoc\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as ViewFactory;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Register bindings in the container.
	 *
	 * @param ViewFactory $view
	 *
	 * @return void
	 */
	public function boot(ViewFactory $view)
	{
		$view->composer('layout.master', 'Mobydoc\Http\ViewComposers\MenuComposer');
	}


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	}
}