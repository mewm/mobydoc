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
	 * @param DocumentBuilder      $docBuilder
	 * @param DocumentSynchronizer $docSynchronizer
	 */
	public function __construct(DocumentBuilder $docBuilder, DocumentSynchronizer $docSynchronizer)
	{
		$this->docBuilder      = $docBuilder;
		$this->docSynchronizer = $docSynchronizer;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 */
	public function synchronizeEverything()
	{
		$_syncedDocuments = [];
//		$_documents       = $this->docBuilder->buildAll();
		$_documents       = $this->docBuilder->buildAllHierarchically();
		print_r($_documents);
		
		if (!empty($_documents)) {
			foreach ($_documents as $document) {
				if ($document->shouldBeSynced()) {
					$_syncedDocuments[] = $this->docSynchronizer->synchronize($document);
				}
			}
		}
		
		$this->docSynchronizer->removeSurplusMeta();
		
		return $_syncedDocuments;
	}
} 