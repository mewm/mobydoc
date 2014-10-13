<?php namespace Mobydoc\Http\Controllers;

use Illuminate\Routing\Controller;
use Mobydoc\Documentation\DocumentService;

class HomeController
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
