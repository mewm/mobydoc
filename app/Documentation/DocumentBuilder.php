<?php


namespace Mobydoc\Documentation;

use Mobydoc\Documentation;
use Mobydoc\Documentation\FileTree\FileTreeGenerator;
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
	 * @var FileTreeGenerator
	 */
	private $fileTree;


	/**
	 * @param DocumentMetaRepositoryInterface $docMetaRepo
	 * @param FileTreeGenerator                        $fileTree
	 */
	public function __construct(DocumentMetaRepositoryInterface $docMetaRepo, FileTreeGenerator $fileTree)
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
//		$_splFile = $file->openFile();
//		$_fileSize > $file->getSize();
		$_docData  = [
			'fileName'            => $file->getBasename(),
			'docPath'             => substr($file->getPath() . '/', strlen(base_path() . '/' . config('mobydoc.doc_path'))),
			'lastChanged'         => date('Y-m-d H:i:s', $file->getCTime()),
			'markDown'            => file_get_contents($file->getPath() . '/' . $file->getBasename()),
			'html'                => !is_null($metaRelation) ? $metaRelation->html : null,
			'metaFileLastChanged' => !is_null($metaRelation) ? $metaRelation->file_last_changed : null,
		];
		$_document = new Documentation\Document(...$_docData);

		return $_document;
	}
	
}