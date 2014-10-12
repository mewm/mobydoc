<?php

namespace Mobydoc\Storage\DocumentMeta;

use Mobydoc\DocumentMeta;

class DocumentMetaRepository implements DocumentMetaRepositoryInterface
{
	/**
	 * @var DocumentMeta
	 */
	private $documentMeta;


	/**
	 * @param DocumentMeta
	 */
	public function __construct(DocumentMeta $document)
	{
		$this->documentMeta = $document;
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
		$_documents = $this->documentMeta->where('path', $path)
		                             ->orderBy('created_date', 'desc')
		                             ->first();

		return $_documents;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 */
	public function getAll()
	{
		$_documents = $this->documentMeta->get();

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


	public function save($document)
	{
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return Document[]
	 */
	public function getAllIndexedByPath()
	{
		$_allDocuments = $this->getAll();
	}
} 