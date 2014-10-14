<?php


namespace Mobydoc\Documentation;

class DocumentService
{
	/**
	 * @var DocumentBuilder
	 */
	private $docBuilder;

	/**
	 * @param DocumentBuilder      $docBuilder
	 */
	public function __construct(DocumentBuilder $docBuilder)
	{
		$this->docBuilder      = $docBuilder;
	}
}