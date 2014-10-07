<?php

namespace Mobydoc\Storage\Document;

use Mobydoc\Document;

class DocumentRepository implements DocumentRepositoryInterface
{
	/**
	 * @var Document
	 */
	private $document;


	/**
	 * @param Document $document
	 */
	public function __construct(Document $document)
	{
		$this->document = $document;
	}


	/**
     * @author Dennis Micky Jensen <dj@miinto.com>
     *
     * @param $path
     *
     * @return Document
     */
    public function getByPath($path)
	{
		$_documents = $this->document->where('path', $path)
		                             ->orderBy('created_date', 'desc')
		                             ->first();
        
        return $_documents;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 */
	public function getAll()
	{
		$_documents = $this->document->get();
		return $_documents;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return Document[]
	 */
	public function getLatestDocumentRevisions()
	{
		// TODO: Implement getLatestDocumentRevisions() method.
	}
} 