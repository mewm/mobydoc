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
	private $html;
	private $metaFileLastChanged;


	/**
	 * @param $fileName
	 * @param $docPath
	 * @param $lastChanged
	 * @param $markdown
	 * @param $html
	 * @param $metaFileLastChanged
	 */
	public function __construct($fileName, $docPath, $lastChanged, $markdown, $html, $metaFileLastChanged)
	{
		$this->fileName            = $fileName;
		$this->docPath             = $docPath;
		$this->lastChanged         = $lastChanged;
		$this->markdown            = $markdown;
		$this->html                = $html;
		$this->metaFileLastChanged = $metaFileLastChanged;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return bool
	 */
	public function shouldBeSynced()
	{
		if (!$this->hasAnyMetaRelation() || !$this->isChangeTimesInSync()) {
			return true;
		}

		return false;
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


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return bool
	 */
	private function hasAnyMetaRelation()
	{
		if (null === $this->html && null == $this->metaFileLastChanged) {
			return false;
		}

		return true;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return bool
	 */
	private function isChangeTimesInSync()
	{
		return ($this->lastChanged == $this->metaFileLastChanged);
	}
}