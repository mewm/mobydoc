<?php


namespace Mobydoc\Documentation;

use Mobydoc\Documentation;
use Mobydoc\DocumentMeta;
use Mobydoc\Storage\DocumentMeta\DocumentMetaRepositoryInterface;
use SplFileInfo;

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
	 * @param FileTree                        $fileTree
	 */
	public function __construct(DocumentMetaRepositoryInterface $docMetaRepo, FileTree $fileTree)
	{
		$this->docMetaRepo = $docMetaRepo;
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
		$_documentTreePathIndexed = $this->docMetaRepo->getAllIndexedByPath();
		
		foreach ($_fileTreePathIndexed as $path => $file) {
			$_metaRelation = isset($_documentTreePathIndexed[$path]) ? $_documentTreePathIndexed[$path] : null;
			$_documents[]  = $this->buildSingle($file, $_metaRelation);
		}

		return $_documents;
	}


	/**
	 * @author   Dennis Micky Jensen <root@mewm.org>
	 *
	 * @param SplFileInfo       $file
	 * @param DocumentMeta|null $metaRelation
	 *
	 * @return array
	 */
	public function buildSingle(\SplFileInfo $file, $metaRelation)
	{
		$_fileName            = $file->getBasename();
		$_lastChanged         = date('Y-m-d H:i:s', $file->getCTime());
		$_splFile             = $file->openFile();
		$_fileSize            = $file->getSize();
		$_markDown            = file_get_contents($file->getPath() . '/' . $file->getBasename());
		$_html                = !is_null($metaRelation) ? $metaRelation->html : null;
		$_metaFileLastChanged = !is_null($metaRelation) ? $metaRelation->file_last_changed : null;
		$_path                = substr($file->getPath() . '/', strlen(base_path() . '/' . config('mobydoc.doc_path')));
		$_document            = new Documentation\Document($_fileName, $_path, $_lastChanged, $_markDown, $_html, $_metaFileLastChanged);

		return $_document;
	}
}