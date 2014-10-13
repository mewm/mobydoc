<?php

namespace Mobydoc\Storage\DocumentMeta;

use Mobydoc\Documentation\Document;
use Mobydoc\DocumentMeta;

interface DocumentMetaRepositoryInterface
{
	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $path
	 *
	 * @return mixed
	 */
	public function getLatestByPath($path);


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $attributes
	 *
	 * @return DocumentMeta
	 */
	public function getByAttributes($attributes);

	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return Document[]
	 */
	public function getAll();


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param DocumentMeta $documentMeta
	 *
	 * return bool
	 */
	public function save(DocumentMeta $documentMeta);


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return DocumentMeta[]
	 */
	public function getAllIndexedByPath();
}