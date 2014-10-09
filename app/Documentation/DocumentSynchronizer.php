<?php


namespace Mobydoc\Documentation;

use Mobydoc\Document;

class DocumentSynchronizer
{
	/**
	 * @var \Parsedown
	 */
	private $parsedown;


	/**
	 * @param Parsedown|\Parsedown $parsedown
	 */
	public function __construct(\Parsedown $parsedown)
	{
		$this->parsedown = $parsedown;
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
		

		/**
		 * @var $_documentsWithNoStorageEntry \SplFileInfo[]
		 */
		$_documentsWithNoStorageEntry = array_diff_key($_fileTreePathIndexed, $_documentTreePathIndexed);
		if (!empty($_documentsWithNoStorageEntry)) {
			foreach ($_documentsWithNoStorageEntry as $document) {
				try {

					$_fileObject = $document->openFile();
					$_fileContents = $_fileObject->fread($_fileObject->getSize());
					
					print $this->parsedown->text($_fileContents); 
					dd();

					$this->documentRepo->save($document);
				} catch (\Exception $e) {
					exit('Implement error handling');
				}
			}
		}

		//Build two arrays of entities

		//Intersect arrays

		//Determine which pairs two synchronize because 
		exit();

		return true;
	}



} 