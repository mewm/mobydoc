<?php namespace Mobydoc\Http\Controllers;

use Illuminate\Routing\Controller;
use Mobydoc\Documentation\DocSynchronizer;

class HomeController extends Controller
{
	/**
	 * @var DocSynchronizer
	 */
	private $docSynchronizer;


	/**
	 * @param DocSynchronizer $docSynchronizer
	 */
	public function __construct(DocSynchronizer $docSynchronizer)
	{
		$this->docSynchronizer = $docSynchronizer;
	}
	/**
	 * @Get("/", as="home")
	 */
	public function index()
	{
		
		exit();
		return view('home.index');
	}
	
	public function synchronizeDocumentation()
	{
		$this->docSynchronizer->synchronize();
	}
}
