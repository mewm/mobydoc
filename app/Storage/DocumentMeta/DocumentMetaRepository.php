<?php

namespace Mobydoc\Storage\DocumentMeta;

use Mobydoc\Documentation\Document;
use Mobydoc\DocumentMeta;

class DocumentMetaRepository implements DocumentMetaRepositoryInterface
{
	/**
	 * @var DocumentMeta
	 */
	private $documentMeta;


	/**
	 * @param DocumentMeta $documentMeta
	 */
	public function __construct(DocumentMeta $documentMeta)
	{
		$this->documentMeta = $documentMeta;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $attributes
	 *
	 * @return DocumentMeta
	 */
	public function getByAttributes($attributes)
	{
		return $this->documentMeta->firstOrNew($attributes);
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $path
	 *
	 * @return DocumentMeta[]
	 */
	public function getLatestByPath($path)
	{
		$_documents = $this->documentMeta->where('path', $path)
		                                 ->orderBy('created_at', 'desc')
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
	public function getAllIndexedByPath()
	{
		$_indexedByPath = [];
		$_allDocuments  = $this->getAll();
		foreach ($_allDocuments as $doc) {
			$_indexedByPath[$doc->path] = $doc;
		}

		return $_indexedByPath;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param DocumentMeta $documentMeta
	 *
	 * @return bool
	 */
	public function save(DocumentMeta $documentMeta)
	{
		return $documentMeta->save();
	}


	public function deleteWherePathNotIn($filePathKeys)
	{
		return $this->documentMeta->whereNotIn('path', $filePathKeys)->delete();
	}
} 