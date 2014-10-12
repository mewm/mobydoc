<?php


namespace Mobydoc\Documentation;

use Parsedown;

class DocumentSynchronizer
{
	/**
	 */
	private $parsedown;


	/**
	 * @param Parsedown $parsedown
	 */
	public function __construct(Parsedown $parsedown)
	{
		$this->parsedown = $parsedown;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @return bool
	 */
	public function synchronize()
	{
		return true;
	}
} 