<?php


namespace Mobydoc\Documentation;


use Mobydoc\Documentation\FileTree\FileTreeGenerator;

class MenuBuilder 
{
	/**
	 * @var FileTreeGenerator
	 */
	private $fileTree;
	/**
	 * @var StringDecoder
	 */
	private $stringDecoder;


	/**
	 * @param FileTreeGenerator      $fileTree
	 * @param StringDecoder $stringDecoder
	 */
	public function __construct(FileTreeGenerator $fileTree, StringDecoder $stringDecoder)
	{
		$this->fileTree = $fileTree;
		$this->stringDecoder = $stringDecoder;
	}


	/**
	 * Bind data to the view.
	 *
	 * @return void
	 */
	public function getHtml()
	{
		$_docPath  = base_path() . '/' . config('mobydoc.doc_path');
		$_fileTree = $this->fileTree->getFileTreeRecursively($_docPath);
//		print_r($_fileTree);
//		exit();
		$_treeHtml = '';
		$this->getFileTreeForRenderHtml($_fileTree, $_treeHtml);

		return $_treeHtml;
	}


	private function getFileTreeForRenderHtml($fileTree, &$html)
	{
		$html .= '<ul>';
		foreach ($fileTree as $path => $item) {
			if (is_array($item)) {
				$html .= '<li>' . $path . '</li>';
				$this->getFileTreeForRenderHtml($item, $html, $path);
			} else {
				$this->addEntryHtml($item, $html);
			}
		}
		$html .= '</ul>';
	}


	private function addEntryHtml(\SplFileInfo $item, &$html)
	{
//		$_nameParts = $this->stringDecoder->getParts($item->getBasename());
		$html .= '<li><a href="">' . $item->getBasename() . '</li>';
	}


//	private function getFileTreeForRender($fileTree, &$tree = [], $previousPath = '')
//	{
//		foreach ($fileTree as $path => $item) {
//			$path = $previousPath . '/' . $path;
//			if (is_array($item)) {
//				$this->getFileTreeForRender($item, $tree[$path], $path);
//			} else {
//				$this->addEntry($item, $tree);
//			}
//		}
//	}
//
//
//	private function addEntry($item, &$tree)
//	{
//		$tree[] = $item;
//	}
}