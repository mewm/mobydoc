<?php


namespace Mobydoc\Documentation;

use Mobydoc\Document;

class DocumentSynchronizer
{
	/**
	 * @var \Parsedown
	 */
	private $parsedown;


	/**
	 * @param Parsedown|\Parsedown $parsedown
	 */
	public function __construct(\Parsedown $parsedown)
	{
		$this->parsedown = $parsedown;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param Document $document
	 *
	 * @return bool
	 */
	public function synchronize(Document $document)
	{
		return true;
	}



} 