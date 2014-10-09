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
    private $markDown;
    private $html;
    private $dbLastChanged;


    /**
     * @param $fileName
     * @param $docPath
     * @param $lastChanged
     * @param $markDown
     * @param $html
     * @param $dbLastChanged
     */
    public function __construct($fileName, $docPath, $lastChanged, $markDown, $html, $dbLastChanged)
    {
        $this->fileName = $fileName;
        $this->docPath = $docPath;
        $this->lastChanged = $lastChanged;
        $this->markDown = $markDown;
        $this->html = $html;
        $this->dbLastChanged = $dbLastChanged;
    }
}