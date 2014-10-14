<?php namespace Mobydoc\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Mobydoc\Documentation\MenuBuilder;

class MenuComposer
{
	/**
	 * @var
	 */
	private $menuBuilder;


	/**
	 * @param MenuBuilder $menuBuilder
	 */
	public function __construct(MenuBuilder $menuBuilder)
	{
		$this->menuBuilder = $menuBuilder;
	}
	/**
	 * Bind data to the view.
	 *
	 * @param  View $view
	 *
	 * @return void
	 */
	public function compose(View $view)
	{
		$_menuHtml = $this->menuBuilder->getHtml();
		$view->with('menu', $_menuHtml);
	}
}