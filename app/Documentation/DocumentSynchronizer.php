<?php

namespace Mobydoc\Documentation;

use Mobydoc\Storage\DocumentMeta\DocumentMetaRepository;
use Parsedown;

class DocumentSynchronizer
{
	/**
	 */
	private $parsedown;
	/**
	 * @var DocumentMetaRepository
	 */
	private $documentMetaRepo;
	/**
	 * @var FileTree
	 */
	private $fileTree;


	/**
	 * @param Parsedown              $parsedown
	 * @param DocumentMetaRepository $documentMetaRepo
	 * @param FileTree               $fileTree
	 */
	public function __construct(Parsedown $parsedown, DocumentMetaRepository $documentMetaRepo, FileTree $fileTree)
	{
		$this->parsedown        = $parsedown;
		$this->documentMetaRepo = $documentMetaRepo;
		$this->fileTree         = $fileTree;
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
		$_metaData                    = $this->documentMetaRepo->getByAttributes(['path' => $document->getFilePath()]);
		$_metaData->path              = $document->getFilePath();
		$_metaData->markdown          = 'wqdqd';
		$_metaData->html              = $this->parsedown->text($document->getMarkdown());
		$_metaData->file_last_changed = $document->getTimeLastChanged();

		if ($this->documentMetaRepo->save($_metaData)) {
			return $document;
		}

		return false;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 */
	public function removeSurplusMeta()
	{
		$_docPath = base_path() . '/' . config('mobydoc.doc_path');
		$_fileTree = $this->fileTree->getFlatFileTreeIndexedByPath($_docPath);

		if(empty($_fileTree)) return true;
		
		if($this->documentMetaRepo->deleteWherePathNotIn(array_keys($_fileTree))) {
			return true;
		}
		
		return false;
	}
} 