<?php


namespace Mobydoc\Documentation;

use Mobydoc\Storage\Document\DocumentRepositoryInterface;
use Mobydoc\Storage\File\FileRepositoryInterface;

class DocSynchronizer
{
	/**
	 * @var FileRepositoryInterface
	 */
	private $fileRepo;
	/**
	 * @var DocumentRepositoryInterface
	 */
	private $documentRepo;


	/**
	 * @param FileRepositoryInterface     $fileRepo
	 * @param DocumentRepositoryInterface $documentRepo
	 */
	public function __construct(FileRepositoryInterface $fileRepo, DocumentRepositoryInterface $documentRepo)
	{
		$this->fileRepo     = $fileRepo;
		$this->documentRepo = $documentRepo;
	}


	public function synchronize()
	{
		//Retrieve file tree
		$_docPath = base_path() . '/' . config('mobydoc.doc_path');
		/**
		 * @var $_fileTree \SplFileInfo[]
		 */
		$_fileTree            = array_flatten($this->fileRepo->getFileTreeRecursively($_docPath));
		$_fileTreePathIndexed = [];
		foreach ($_fileTree as $file) {
			$_filePath                        = ltrim(substr($file->getPath() . $file->getBasename(), strlen($_docPath)), '/');
			$_fileTreePathIndexed[$_filePath] = $file;
		}

		//Take all documents from database
		$_documents               = $this->documentRepo->getAll();
		$_documentTreePathIndexed = [];
		foreach ($_documents as $document) {
            $_documentTreePathIndexed[$_documents->path] = $_document;
		}

		$_documentsWithNoStorageEntry = array_diff_key($_fileTreePathIndexed, $_documentTreePathIndexed);
		

		//Build two arrays of entities

		//Intersect arrays

		//Determine which pairs two synchronize because 
		exit();

		return true;
	}
} 