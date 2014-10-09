<?php


namespace Mobydoc\Documentation;

use Mobydoc\Documentation;
use Mobydoc\Storage\Document\DocumentRepositoryInterface;
use Mobydoc\Storage\File\FileRepositoryInterface;

class DocumentBuilder
{
	/**
	 * @var FileRepositoryInterface
	 */
	private $fileRepo;
	/**
	 * @var DocumentRepositoryInterface
	 */
	private $docRepo;


	/**
	 * @param FileRepositoryInterface     $fileRepo
	 * @param DocumentRepositoryInterface $docRepo
	 */
	public function __construct(FileRepositoryInterface $fileRepo, DocumentRepositoryInterface $docRepo)
	{
		$this->fileRepo = $fileRepo;
		$this->docRepo  = $docRepo;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 * @return Documentation\Document[]
	 */
	public function buildAll()
	{
		$_documents               = [];
		$_docPath                 = base_path() . '/' . config('mobydoc.doc_path');
		$_fileTreePathIndexed     = $this->fileRepo->getFlatFileTreeIndexedByPath($_docPath);
		dd($_fileTreePathIndexed);
		$_documentTreePathIndexed = $this->docRepo->getAllIndexedByPath();

		foreach ($_fileTreePathIndexed as $path => $file) {

			$_fileName      = $file->getBasename();
			$_lastChanged   = date('Y-m-d H:i:s', $file->getCTime());
			$_splFile       = $file->openFile();
			$_fileSize      = $file->getSize();
			$_markDown      = file_get_contents($file->getPath());
			$_html          = null;
			$_dbLastChanged = null;

			if (isset($_documentTreePathIndexed[$path])) {
				$_html          = $_documentTreePathIndexed[$path]->html;
				$_dbLastChanged = $_documentTreePathIndexed[$path]->updated_at;
			}

			$_documents[] = new Documentation\Document($_fileName, $path, $_lastChanged, $_markDown, $_html, $_dbLastChanged);
		}

		return $_documents;
	}
}