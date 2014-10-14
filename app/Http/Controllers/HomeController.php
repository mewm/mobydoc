<?php namespace Mobydoc\Http\Controllers;

use Illuminate\Contracts\View\View;
use Mobydoc\Documentation\DocumentService;

use Illuminate\Contracts\View\Factory as ViewFactory;

class HomeController
{
	protected $layout = 'layout.master';
	/**
	 * @var DocumentService
	 */
	private $documentService;
	/**
	 * @var View
	 */
	private $view;


	/**
	 * @param DocumentService  $documentService
	 * @param ViewFactory $view
	 */
	public function __construct(DocumentService $documentService, ViewFactory $view)
	{
		$this->documentService = $documentService;
		$this->view = $view;
	}
	/**
	 */
	public function index()
	{
		return view('home.index');
	}
	
	public function synchronizeDocumentation()
	{
		echo 'Synced<pre>';
		$syncedDocs = $this->documentService->synchronizeEverything();
		foreach($syncedDocs as $doc) {
			echo $doc->getFilePath() . "<br>";
		}
	}
}
