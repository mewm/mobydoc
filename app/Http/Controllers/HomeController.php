<?php namespace Mobydoc\Http\Controllers;

use Illuminate\Routing\Controller;

class HomeController extends Controller
{

	public function __construct()
	{
	}
	/**
	 * @Get("/", as="home")
	 */
	public function index()
	{
		
		exit();
		return view('home.index');
	}
}
