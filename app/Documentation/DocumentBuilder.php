<?php


namespace Mobydoc\Documentation;

use Mobydoc\Documentation;
use Mobydoc\Documentation\FileTree\FileTreeGenerator;
use SplFileInfo;

class DocumentBuilder
{
	/**
	 * @var FileTreeGenerator
	 */
	private $fileTree;


	/**
	 * @param FileTreeGenerator                        $fileTree
	 */
	public function __construct(FileTreeGenerator $fileTree)
	{
		$this->fileTree    = $fileTree;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return Documentation\Document[]
	 */
	public function buildAll()
	{
		$_documents               = [];
		$_docPath                 = base_path() . '/' . config('mobydoc.doc_path');
		$_fileTreePathIndexed     = $this->fileTree->getFlatFileTreeIndexedByPath($_docPath);

		foreach ($_fileTreePathIndexed as $path => $file) {
			$_documents[]  = $this->build($file);
		}

		return $_documents;
	}


	/**
	 * @author   Dennis Micky Jensen <root@mewm.org>
	 *
	 * @param SplFileInfo       $file
	 *
	 * @return array
	 */
	public function build(\SplFileInfo $file)
	{
//		$_splFile = $file->openFile();
//		$_fileSize > $file->getSize();
		$_docData  = [
			'fileName'            => $file->getBasename(),
			'docPath'             => substr($file->getPath() . '/', strlen(base_path() . '/' . config('mobydoc.doc_path'))),
			'lastChanged'         => date('Y-m-d H:i:s', $file->getCTime()),
			'markDown'            => file_get_contents($file->getPath() . '/' . $file->getBasename()),
		];
		$_document = new Documentation\Document(...$_docData);

		return $_document;
	}
	
}