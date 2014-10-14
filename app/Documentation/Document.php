<?php


namespace Mobydoc\Documentation;

/**
 * Class Document
 *
 * @package Mobydoc\Documentation
 */
class Document
{
	private $docPath;
	private $fileName;
	private $lastChanged;
	private $markdown;


	/**
	 * @param $fileName
	 * @param $docPath
	 * @param $lastChanged
	 * @param $markdown
	 */
	public function __construct($fileName, $docPath, $lastChanged, $markdown)
	{
		$this->fileName            = $fileName;
		$this->docPath             = $docPath;
		$this->lastChanged         = $lastChanged;
		$this->markdown            = $markdown;
		$this->html                = $html;
	}
	

	public function getFilePath()
	{
		return $this->docPath . $this->fileName;
	}


	public function getMarkdown()
	{
		return $this->markdown;
	}


	public function getTimeLastChanged()
	{
		return $this->lastChanged;
	}
}