<?php

namespace Mobydoc\Documentation\FileTree;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

class FileTreeGenerator
{
	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param      $path
	 *
	 * @return \SplFileInfo[]
	 */
	public function getFileTreeRecursively($path)
	{
		$_fileSubPaths = [];
		$_iterator     = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
		foreach ($_iterator as $item) {
			if ($item->isDir()) {
				$_path = [$item->getFilename() => []];	
			} else {
				$_path[$item->getFilename()] = $item;
			}

			for ($depth = $_iterator->getDepth() - 1; $depth >= 0; $depth--) {
				$_path = [
					$_iterator->getSubIterator($depth)->current()->getFilename() => $_path
				];
			}
			
			$_fileSubPaths = array_merge_recursive($_fileSubPaths, $_path);
		}

		print_r($_fileSubPaths);
		exit();
 
		return $_fileSubPaths;
	}


	/**
	 * @author Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $path
	 *
	 * @return SplFileInfo[]
	 */
	public function getFlatFileTreeIndexedByPath($path)
	{
		$_fileTree            = $this->getFlatFileTree($path);
		$_fileTreePathIndexed = [];
		foreach ($_fileTree as &$file) {
			$_filePath                        = '/' . ltrim(substr($file->getPath() . '/' . $file->getBasename(), strlen($path)), '/');
			$_fileTreePathIndexed[$_filePath] = $file;
		}

		return $_fileTreePathIndexed;
	}


	/**
	 * @author   Dennis Micky Jensen <dj@miinto.com>
	 *
	 * @param $path
	 *
	 * @return SplFileInfo[]
	 */
	public function getFlatFileTree($path)
	{
		return array_flatten($this->getFileTreeRecursively($path));
	}
} 