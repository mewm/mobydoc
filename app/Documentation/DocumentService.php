<?php


namespace Mobydoc\Documentation;

class DocumentService
{
	/**
	 * @var DocumentBuilder
	 */
	private $docBuilder;
	/**
	 * @var DocumentSynchronizer
	 */
	private $docSynchronizer;

	/**
	 * @param DocumentBuilder             $docBuilder
	 * @param DocumentSynchronizer        $docSynchronizer
	 */
	public function __construct(DocumentBuilder $docBuilder, DocumentSynchronizer $docSynchronizer)
	{
		$this->docBuilder = $docBuilder;
		$this->docSynchronizer = $docSynchronizer;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 */
	public function synchronizeEverything()
	{
		$_documents = $this->docBuilder->buildAll();
		print "<pre>";
		print_r($_documents);
		exit();
	}
	
	
} 