<?php


namespace Mobydoc\Documentation;

use Mobydoc\Documentation;
use Mobydoc\Storage\DocumentMeta\DocumentMetaRepositoryInterface;

class DocumentBuilder
{
	/**
	 * @var DocumentMetaRepositoryInterface
	 */
	private $docMetaRepo;
	/**
	 * @var FileTree
	 */
	private $fileTree;


	/**
	 * @param DocumentMetaRepositoryInterface $docMetaRepo
	 * @param FileTree                    $fileTree
	 */
	public function __construct(DocumentMetaRepositoryInterface $docMetaRepo, FileTree $fileTree)
	{
		$this->docMetaRepo  = $docMetaRepo;
		$this->fileTree = $fileTree;
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
		$_documentTreePathIndexed = $this->docMetaRepo->getAllIndexedByPath();
		dd($_documentTreePathIndexed);
		foreach ($_fileTreePathIndexed as $path => $file) {
			
			$_documents = $this->buildSingle($file, $_documentTreePathIndexed, $path    );
		}

		return $_documents;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $file
	 * @param $path
	 *
	 * @return array
	 */
	protected function buildSingle(\SplFileInfo $file, $path)
	{
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

		$_document = new Documentation\Document($_fileName, $path, $_lastChanged, $_markDown, $_html, $_dbLastChanged);

		return $_document;
	}
}