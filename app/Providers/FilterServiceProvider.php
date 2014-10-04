<?php namespace Mobydoc\Providers;

use Illuminate\Foundation\Support\Providers\FilterServiceProvider as ServiceProvider;

class FilterServiceProvider extends ServiceProvider {

	/**
	 * The filters that should run before all requests.
	 *
	 * @var array
	 */
	protected $before = [
		'Mobydoc\Http\Filters\MaintenanceFilter',
	];

	/**
	 * The filters that should run after all requests.
	 *
	 * @var array
	 */
	protected $after = [
		//
	];

	/**
	 * All available route filters.
	 *
	 * @var array
	 */
	protected $filters = [
		'auth' => 'Mobydoc\Http\Filters\AuthFilter',
		'auth.basic' => 'Mobydoc\Http\Filters\BasicAuthFilter',
		'csrf' => 'Mobydoc\Http\Filters\CsrfFilter',
		'guest' => 'Mobydoc\Http\Filters\GuestFilter',
	];

}
