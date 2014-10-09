<?php namespace Mobydoc\Http\Controllers;

use Illuminate\Routing\Controller;
use Mobydoc\Documentation\DocumentService;
use Mobydoc\Documentation\DocumentSynchronizer;

class HomeController extends Controller
{
	/**
	 * @var DocumentService
	 */
	private $documentService;


	/**
	 * @param DocumentService $documentService
	 */
	public function __construct(DocumentService $documentService)
	{
		$this->documentService = $documentService;
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
		$this->documentService->synchronizeEverything();
	}
}
